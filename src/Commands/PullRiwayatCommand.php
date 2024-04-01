<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Kanekescom\Siasn\Simpeg\Exceptions\BadEndpointCallException;
use Kanekescom\Siasn\Simpeg\Models;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;
use Kanekescom\Siasn\Simpeg\Riwayat;

class PullRiwayatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-riwayat
                            {endpoint?* : Endpoint API}}
                            {--nipBaru= : nipBaru. Can be separated by commas.}
                            {--skip=0 : skip value}
                            {--onlyDoesntHave : only those that do not have data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull riwayat pegawai to database from endpoint on SIASN Simpeg API';

    protected $endpoints = [
        'angkakredit' => [
            'model' => Models\PnsRwAngkakredit::class,
            'method' => 'getAngkakredit',
            'pnsId' => 'pns',
        ],
        'cltn' => [
            'model' => Models\PnsRwCltn::class,
            'method' => 'getCltn',
            'pnsId' => 'pnsOrangId',
        ],
        'diklat' => [
            'model' => Models\PnsRwDiklat::class,
            'method' => 'getDiklat',
            'pnsId' => 'idPns',
        ],
        'dp3' => [
            'model' => Models\PnsRwDp3::class,
            'method' => 'getDp3',
            'pnsId' => 'pnsId',
        ],
        'golongan' => [
            'model' => Models\PnsRwGolongan::class,
            'method' => 'getGolongan',
            'pnsId' => 'idPns',
        ],
        'hukdis' => [
            'model' => Models\PnsRwHukdis::class,
            'method' => 'getHukdis',
            'pnsId' => 'pnsOrang',
        ],
        'jabatan' => [
            'model' => Models\PnsRwJabatan::class,
            'method' => 'getJabatan',
            'pnsId' => 'idPns',
        ],
        'kinerjaperiodik' => [
            'model' => Models\PnsRwKinerjaperiodik::class,
            'method' => 'getKinerjaperiodik',
            'pnsId' => 'pnsDinilaiId',
        ],
        'kursus' => [
            'model' => Models\PnsRwKursus::class,
            'method' => 'getKursus',
            'pnsId' => 'idPns',
        ],
        'masakerja' => [
            'model' => Models\PnsRwMasakerja::class,
            'method' => 'getMasakerja',
            'pnsId' => 'idPns',
        ],
        'pemberhentian' => [
            'model' => Models\PnsRwPemberhentian::class,
            'method' => 'getPemberhentian',
            'pnsId' => 'pns',
        ],
        'pendidikan' => [
            'model' => Models\PnsRwPendidikan::class,
            'method' => 'getPendidikan',
            'pnsId' => 'idPns',
        ],
        'penghargaan' => [
            'model' => Models\PnsRwPenghargaan::class,
            'method' => 'getPenghargaan',
            'pnsId' => 'pnsOrangId',
        ],
        'pindahinstansi' => [
            'model' => Models\PnsRwPindahinstansi::class,
            'method' => 'getPindahinstansi',
            'pnsId' => 'pnsOrang',
        ],
        'unor' => [
            'model' => Models\PnsRwPnsunor::class,
            'method' => 'getUnor',
            'pnsId' => 'pnsOrang',
        ],
        'pwk' => [
            'model' => Models\PnsRwPwk::class,
            'method' => 'getPwk',
            'pnsId' => 'pnsOrang',
        ],
        'skp' => [
            'model' => Models\PnsRwSkp::class,
            'method' => 'getSkp',
            'pnsId' => 'pns',
        ],
        'skp22' => [
            'model' => Models\PnsRwSkp22::class,
            'method' => 'getSkp22',
            'pnsId' => 'pnsDinilaiId',
        ],
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $endpointOptions = collect($this->endpoints)
            ->keys()
            ->mapWithKeys(fn ($item) => [$item => $item]);
        $endpoints = collect($this->argument('endpoint'));

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

        $startPegawai = now();
        $endpoints = $endpoints->keys();
        $endpointCount = $endpoints->count();
        $nipBaru = $this->option('nipBaru') ? explode(',', $this->option('nipBaru')) : [];
        $skip = (int) $this->option('skip');
        $onlyDoesntHave = $this->option('onlyDoesntHave');
        $iPegawai = $skip;
        $pegawais = filled($nipBaru) ? Pegawai::whereIn('nip_baru', $nipBaru) : new Pegawai;

        if ($onlyDoesntHave && filled($endpoints->count() == 1)) {
            $relationName = str($endpoints->first())
                ->plural();
            $pegawais = $pegawais->doesntHave($relationName);
        }

        $pegawaiCount = $pegawais->count();

        if ($skip >= $pegawaiCount) {
            $this->components->error('Skip option value exceeds number of pegawai or not found.');

            return self::FAILURE;
        }

        $pegawais->get()
            ->skip($skip)
            ->each(function ($pegawai) use ($pegawaiCount, &$iPegawai, $endpoints, $endpointCount, $startPegawai, $skip) {
                $startEndpoint = now();
                $iPegawai++;
                $iEndpoint = 0;

                $this->info("PEGAWAI: [{$iPegawai}/{$pegawaiCount}] {$pegawai->nip_baru}");

                $endpoints->each(function ($endpoint) use ($pegawai, $endpointCount, &$iEndpoint) {
                    $iEndpoint++;
                    $model = new $this->endpoints[$endpoint]['model'];
                    $method = $this->endpoints[$endpoint]['method'];
                    $pnsId = $this->endpoints[$endpoint]['pnsId'];

                    try {
                        $response = Riwayat::$method($pegawai->nip_baru);
                    } catch (\Exception $e) {
                        $this->error($e);
                        $this->newLine();

                        logger()->error($e->getMessage());

                        return self::FAILURE;
                    }

                    $this->comment("ENDPOINT: [{$iEndpoint}/{$endpointCount}] {$endpoint}");

                    if ($response->count()) {
                        try {
                            $bar = $this->output->createProgressBar($response->count());
                            $bar->start();

                            $modelItem = $model->where($pnsId, $pegawai->pns_id);

                            DB::transaction(function () use ($pnsId, $modelItem, $response, $bar) {
                                if (config('siasn-simpeg.truncate_model_before_pull')) {
                                    $modelItem->delete();
                                }

                                $response->chunk(config('siasn-simpeg.chunk_data'))->each(function ($item) use ($modelItem, $pnsId, $bar) {
                                    $item = $item->map(function ($item) {
                                        if (isset($item['path'])) {
                                            $item['path'] = collect($item['path'])->toJson();
                                        }

                                        return $item;
                                    });
                                    $modelItem->upsert($item->toArray(), $pnsId);
                                    $modelItem->withTrashed()
                                        ->whereIn('id', $item->pluck('id'))
                                        ->restore();

                                    $bar->advance($item->count());
                                });
                            });

                            $bar->finish();

                            $this->newLine(2);
                        } catch (\Exception $e) {
                            $this->error($e);
                            $this->newLine();

                            logger()->error($e->getMessage());

                            return self::FAILURE;
                        }
                    }
                });

                $executedItems = Number::format($iPegawai - $skip);

                $this->warn("All endpoint tasks for {$pegawai->nip_baru} are processed in {$startEndpoint->shortAbsoluteDiffForHumans(now(), 1)}");
                $this->info(str("The task has run so far for {$startPegawai->shortAbsoluteDiffForHumans(now(), 1)} and {$executedItems} items have been executed")->upper());
                $this->newLine();
            });

        return self::SUCCESS;
    }
}
