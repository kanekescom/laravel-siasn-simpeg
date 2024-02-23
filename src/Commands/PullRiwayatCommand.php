<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Exceptions\BadEndpointCallException;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;

class PullRiwayatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-riwayat
                            {endpoint? : Endpoint API}}
                            {nipBaru? : NIP Baru}
                            {--skip=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull riwayat data to database from endpoint on SIASN Simpeg API';

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
        'pns-rw-diklat' => 'pnsId',
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
        $endpointOptions = collect($this->endpoints)->mapWithKeys(function ($item) {
            return [$item => $item];
        });
        $endpoints = collect($this->argument('endpoint'));
        $nipBaru = $this->argument('nipBaru');
        $skip = $this->option('skip');

        if (filled($endpoints->first()) && blank($endpoints = $endpointOptions->only($endpoints))) {
            throw new BadEndpointCallException('Endpoint does not exist.');
        }

        if (blank($endpoints->first())) {
            $endpoints = collect($this->choice(
                'What do you want to call endpoint? Separate with commas.',
                collect(['all' => 'all'])->merge($endpointOptions)->keys()->toArray(),
                0,
                null,
                true,
            ));

            if ($endpoints->contains('all')) {
                $endpoints = $endpointOptions;
            } else {
                $endpoints = $endpointOptions->only($endpoints);
            }
        }

        $start = now();
        $endpoints = $endpoints->keys();
        $endpointCount = $endpoints->count();
        $endpointErrors = collect([]);
        $pegawais = $nipBaru ? Pegawai::where('nip_baru', $nipBaru)->get() : Pegawai::get()->skip($skip);
        $pegawaiCount = $pegawais->count();
        $iEndpoint = 0;

        $endpoints->each(function ($endpoint) use ($endpointCount, &$endpointErrors, &$iEndpoint, $pegawais, $pegawaiCount) {
            $iEndpoint++;
            $modelName = str($endpoint)->studly();
            $modelClass = "Kanekescom\\Siasn\\Simpeg\\Models\\{$modelName}";
            $model = new $modelClass;
            $simpegMethod = 'get'.$modelName;
            $iPegawai = 0;

            $this->info("ENDPOINT: [{$iEndpoint}/{$endpointCount}] {$endpoint}");

            $pegawais->each(function ($pegawai) use (&$endpointErrors, $endpoint, $simpegMethod, $pegawaiCount, &$iPegawai, $model) {
                $iPegawai++;
                $this->info("PEGAWAI: {$endpoint} [{$iPegawai}/{$pegawaiCount}] {$pegawai->nip_baru}");

                $response = Simpeg::$simpegMethod($pegawai->nip_baru);

                // if ($response->count() == 0) {
                //     $errorMessage = "{$endpoint} data for {$pegawai->nip_baru} is not found";
                //     $endpointErrors->put($endpoint, $errorMessage);
                //     $this->warning('Data not found');
                // }

                try {
                    $bar = $this->output->createProgressBar($response->count());
                    $bar->start();

                    $model = $model->where($this->pnsId[$endpoint], $pegawai->pns_id);

                    DB::transaction(function () use ($endpoint, $model, $response, $bar) {
                        if (config('siasn-simpeg.delete_model_before_pull')) {
                            $model->delete();
                        }

                        $response->chunk(config('siasn-simpeg.chunk_data'))->each(function ($item) use ($model, $endpoint, $bar) {
                            $item = $item->map(function ($item) {
                                $item['path'] = collect($item['path'])->toJson();

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

                    $this->newLine();
                    $this->newLine();
                } catch (\Exception $e) {
                    $this->error($e);
                    $this->newLine();

                    return self::FAILURE;
                }
            });
        });

        if ($endpointErrors) {
            $this->info("There is {$endpointErrors->count()} error(s):");

            $endpointErrors->each(function ($value, $key) {
                $this->error(" {$key}: {$value} ");
            });

            $this->newLine();
        }

        $this->comment("All tasks are processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");

        return self::SUCCESS;
    }
}
