<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Api\Simpeg\Exceptions\BadEndpointCallException;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;

class PullRiwayatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-riwayat
                            {nipBaru? : NIP Baru}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull riwayat data to database from endpoint on SIASN Simpeg API';

    /**
     * The console command choice map.
     *
     * @var string
     */
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

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $endpointOptions = collect($this->endpoints);
        $endpoints = str($this->argument('endpoint'))->explode(',');

        if (filled($endpoints->first()) && blank($endpoints = $endpointOptions->only($endpoints))) {
            throw new BadEndpointCallException('Endpoint does not exist.');
        }

        if (blank($endpoints->first())) {
            $endpoints = collect($this->choice(
                'What do you want to call endpoint? Separate with commas.',
                collect(['all' => 'all'])->merge($endpointOptions)->toArray(),
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
            $modelName = str($endpoint)->studly();
            $modelClass = $modelName->prepend('Kanekescom\Siasn\Simpeg\Models\/');
            $model = new $modelClass;
            $simpegMethod = 'get' . $modelName;
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
