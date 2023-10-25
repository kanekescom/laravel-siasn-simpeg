<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Models\PegawaiCsv;
use Kanekescom\Siasn\Simpeg\Repositories\PegawaiRepository;

class ImportPegawaiCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:import-pegawai-csv
                            {filePath : File Path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from csv file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();

        DB::transaction(function () {
            $filePath = $this->argument('filePath');
            $repository = app(PegawaiRepository::class);
            $model = new PegawaiCsv($filePath);

            if (blank($model)) {
                $this->error('Data not found!');
            }

            if (filled($model)) {
                $repository->query()
                    ->delete();

                $bar = $this->output->createProgressBar($model->count());
                $bar->start();

                $model->chunk(500)->each(function ($item) use ($repository, $bar) {
                    $repository->upsert($item->toArray(), 'pns_id');
                    $repository->query()
                        ->withTrashed()
                        ->whereIn('pns_id', $item->pluck('pns_id'))
                        ->restore();

                    $bar->advance($item->count());
                });

                $bar->finish();
            }
        });

        $this->newLine();
        $this->comment("Processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");
    }
}
