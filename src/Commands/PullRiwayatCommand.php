<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Exceptions\BadEndpointCallException;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;
use Kanekescom\Siasn\Simpeg\Models\PullTracking;
use Kanekescom\Siasn\Simpeg\Models\PullTrackingError;
use Kanekescom\Siasn\Simpeg\Services\PullTrackingErrorService;

class PullRiwayatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-riwayat
                            {endpoint? : Endpoint API}}
                            {--nipBaru= : NIP Baru}
                            {--skip=0}
                            {--track}
                            {--startOver}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull riwayat pegawai to database from endpoint on SIASN Simpeg API';

    protected $endpoints = [
        'pns-rw-angkakredit',
        'pns-rw-cltn',
        'pns-rw-diklat',
        'pns-rw-dp3',
        'pns-rw-golongan',
        'pns-rw-hukdis',
        'pns-rw-jabatan',
        'pns-rw-kinerjaperiodik',
        'pns-rw-kursus',
        'pns-rw-masakerja',
        'pns-rw-pemberhentian',
        'pns-rw-pendidikan',
        'pns-rw-penghargaan',
        'pns-rw-pindahinstansi',
        'pns-rw-pnsunor',
        'pns-rw-pwk',
        'pns-rw-skp',
        'pns-rw-skp22',
    ];

    protected $pnsId = [
        'pns-rw-angkakredit' => 'pns',
        'pns-rw-cltn' => 'pnsOrangId',
        'pns-rw-diklat' => 'idPns',
        'pns-rw-dp3' => 'pnsId',
        'pns-rw-golongan' => 'idPns',
        'pns-rw-hukdis' => 'pnsOrang',
        'pns-rw-jabatan' => 'idPns',
        'pns-rw-kinerjaperiodik' => 'pnsDinilaiId',
        'pns-rw-kursus' => 'idPns',
        'pns-rw-masakerja' => 'idPns',
        'pns-rw-pemberhentian' => 'pnsOrang',
        'pns-rw-pendidikan' => 'idPns',
        'pns-rw-penghargaan' => 'pnsOrangId',
        'pns-rw-pindahinstansi' => 'pnsOrang',
        'pns-rw-pnsunor' => 'pnsOrang',
        'pns-rw-pwk' => 'pnsOrang',
        'pns-rw-skp' => 'pns',
        'pns-rw-skp22' => 'pnsDinilaiId',
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $endpointOptions = collect($this->endpoints)->mapWithKeys(fn ($item) => [$item => $item]);
        $endpoint = $this->argument('endpoint');
        $nipBaru = $this->option('nipBaru');
        $track = $this->option('track');
        $startOver = $this->option('startOver');
        $skip = $startOver ? 0 : $this->option('skip');

        if (blank($endpoints = $endpointOptions->only($endpoint))) {
            throw new BadEndpointCallException('Endpoint does not exist.');
        }

        $pullTrackingCommandName = 'siasn-simpeg:pull-riwayat';
        $pullTrackingCommandName .= $endpoint ? " {$endpoint}" : $endpoint;
        $hasPullTracking = $nipBaru ? null : PullTracking::where('command', $pullTrackingCommandName)->first();
        $lastTryPullTracking = $startOver ? 0 : $hasPullTracking?->last_try;
        $skip = (int) ($skip > $lastTryPullTracking ? $skip : $lastTryPullTracking);
        $iPegawai = $skip;

        if ($startOver && $hasPullTracking) {
            try {
                $hasPullTracking->errors()->delete();
                $hasPullTracking->delete();
                $hasPullTracking = null;
            } catch (\Exception $e) {
                $this->error($e);
                $this->newLine();

                return self::FAILURE;
            }

            $skip = 0;

            $this->info(str('Start over command.')->upper());
            $this->newLine();
        }

        if (blank($endpoint) && ! ($track && $hasPullTracking)) {
            $endpoints = collect($this->choice(
                'What do you want to call endpoint? Separate with commas.',
                collect(['all' => 'all'])->merge($endpointOptions)->keys()->toArray(),
                0,
                null,
                true,
            ));

            $endpoints = $endpoints->contains('all') ? $endpointOptions : $endpointOptions->only($endpoints);
        }

        $startPegawai = now();
        $endpoints = $endpoints->keys();
        $endpointCount = $endpoints->count();
        $pullTracking = new PullTracking;
        $pullTrackingError = new PullTrackingError;
        $pegawais = Pegawai::get();

        if ($nipBaru) {
            $pegawais = Pegawai::where('nip_baru', $nipBaru)->get();
        }

        $pegawaiCount = $pegawais->count();

        if ($skip >= $pegawaiCount) {
            $this->components->error('Skip option value exceeds number of pegawai.');

            return self::FAILURE;
        }

        if ($nipBaru == null && $track) {
            $pullTracking = PullTracking::updateOrCreate(['command' => $pullTrackingCommandName], [
                'start_from' => $skip,
                'amount' => $pegawaiCount,
            ]);
        }

        if ($nipBaru == null && $track && ! $startOver && $hasPullTracking && $hasPullTracking->done_at) {
            $this->info('Pull command has been completed. Use --startOver to re-pull from the beginning.');

            return self::SUCCESS;
        }

        if ($nipBaru == null && $track && ! $startOver && $hasPullTracking) {
            $pullingStartingForm = $skip + 1;

            $this->info(str("Continue pulling starting from {$pullingStartingForm}")->upper());
            $this->newLine();
        }

        $pegawais = $pegawais->skip($skip);
        $pegawais->each(function ($pegawai) use ($pegawaiCount, &$iPegawai, $endpoints, $endpointCount, $startPegawai, $pullTracking, $pullTrackingError, $skip, $nipBaru, $track) {
            $startEndpoint = now();
            $iPegawai++;
            $iEndpoint = 0;

            $this->info("PEGAWAI: [{$iPegawai}/{$pegawaiCount}] {$pegawai->nip_baru}");

            $endpoints->each(function ($endpoint) use ($pegawai, $endpointCount, &$iEndpoint, $pullTracking, $pullTrackingError, $nipBaru, $track) {
                $iEndpoint++;
                $modelName = str($endpoint)->studly();
                $modelClass = "Kanekescom\\Siasn\\Simpeg\\Models\\{$modelName}";
                $model = new $modelClass;
                $simpegMethod = 'get'.$modelName;

                try {
                    $response = Simpeg::$simpegMethod($pegawai->nip_baru);
                } catch (\Exception $e) {
                    if ($nipBaru == null && $track) {
                        new PullTrackingErrorService($e, $pullTrackingError, $pullTracking, $pegawai->pns_id);
                    }

                    $this->error($e);
                    $this->newLine();

                    return self::FAILURE;
                }

                $this->comment("ENDPOINT: [{$iEndpoint}/{$endpointCount}] {$endpoint}");

                if ($response->count()) {
                    try {
                        $bar = $this->output->createProgressBar($response->count());
                        $bar->start();

                        $model = $model->where($this->pnsId[$endpoint], $pegawai->pns_id);

                        DB::transaction(function () use ($endpoint, $model, $response, $bar) {
                            if (config('siasn-simpeg.truncate_model_before_pull')) {
                                $model->delete();
                            }

                            $response->chunk(config('siasn-simpeg.chunk_data'))->each(function ($item) use ($model, $endpoint, $bar) {
                                $item = $item->map(function ($item) {
                                    if (isset($item['path'])) {
                                        $item['path'] = collect($item['path'])->toJson();
                                    }

                                    return Arr::except($item, [
                                        'created_at',
                                        'updated_at',
                                        'deleted_at',
                                    ]);
                                });
                                $model->upsert($item->toArray(), $this->pnsId[$endpoint]);
                                $model->withTrashed()
                                    ->whereIn('id', $item->pluck('id'))
                                    ->restore();

                                $bar->advance($item->count());
                            });
                        });

                        $bar->finish();

                        $this->newLine(2);
                    } catch (\Exception $e) {
                        if ($nipBaru == null && $track) {
                            new PullTrackingErrorService($e, $pullTrackingError, $pullTracking, $pegawai->pns_id);
                        }

                        $this->error($e);
                        $this->newLine();

                        return self::FAILURE;
                    }
                }
            });

            $pullTracking?->update(['last_try' => $iPegawai]);
            $executedItems = $iPegawai - $skip;

            $this->info("All endpoint tasks for {$pegawai->nip_baru} are processed in {$startEndpoint->shortAbsoluteDiffForHumans(now(), 1)}.");
            $this->info(str("All tasks are running for {$startPegawai->shortAbsoluteDiffForHumans(now(), 1)} and {$executedItems} items have been executed.")->upper());
            $this->newLine();
        });

        $pullTracking?->update(['done_at' => now()]);

        return self::SUCCESS;
    }
}
