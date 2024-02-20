<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Kanekescom\Siasn\Api\Simpeg\Exceptions\BadEndpointCallException;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;

class PullCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull
                        {endpoint? : Endpoint API}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull data to database from endpoint on SIASN Simpeg API';

    /**
     * The console command choice map.
     *
     * @var string
     */
    protected $endpoints = [
        'data-anak',
        'data-ortu',
        'data-pasangan',
        'data-utama',
        'list-kp-instansi',
        'list-pengadaan-instansi',
        'list-pensiun-instansi',
        'referensi-unor',
        'rw-angka-kredit',
        'rw-cltn',
        'rw-diklat',
        'rw-dp3',
        'rw-golongan',
        'rw-hukdis',
        'rw-jabatan',
        'rw-kursus',
        'rw-masa-kerja',
        'rw-pemberhentian',
        'rw-pendidikan',
        'rw-penghargaan',
        'rw-pindah-instansi',
        'rw-pwk',
        'rw-skp',
        'rw-skp22',
        'rw-unor',
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $endpointOptions = collect($this->endpoints);
        $endpoints = Str::of($this->argument('endpoint'))->explode(',');

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
        $i = 0;

        $endpoints->each(function ($endpoint) use ($endpointCount, &$endpointErrors, &$i) {
            $i++;
            $modelName = Str::of($endpoint)->studly();
            $modelClass = config("siasn-simpeg.models.{$modelName->snake()}");
            $model = new $modelClass;
            $simpegMethod = 'get'.$modelName;
            $response = Simpeg::$simpegMethod();

            $this->info("[{$i}/{$endpointCount}] {$endpoint}");

            if ($response->count() == 0) {
                $errorMessage = 'Data not found';
                $endpointErrors->put($endpoint, $errorMessage);

                $this->error(" {$errorMessage} ");
            }

            try {
                $bar = $this->output->createProgressBar($response->count());
                $bar->start();

                DB::transaction(function () use ($model, $response, $bar) {
                    if (config('siasn-simpeg.delete_model_before_pull')) {
                        $model->query()->delete();
                    }

                    $response->chunk(config('siasn-simpeg.chunk_data'))->each(function ($item) use ($model, $bar) {
                        $model->upsert($item->toArray(), 'id');
                        $model->query()
                            ->withTrashed()
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
