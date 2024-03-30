<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Http\Client\Pengadaan;
use Kanekescom\Siasn\Simpeg\Models\PengadaanListPengadaanInstansi;

class PullPengadaanListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-pengadaan-list
                            {tahun : tahun}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull pengadaan list to database from endpoint on SIASN SIMPEG API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();
        $tahun = $this->argument('tahun');
        $query = [
            'tahun' => $tahun,
        ];

        try {
            $response = Pengadaan::getList([], $query);
        } catch (\Exception $e) {
            $this->error($e);
            $this->newLine();

            return self::FAILURE;
        }

        if ($response->count()) {
            try {
                $bar = $this->output->createProgressBar($response->count());
                $bar->start();

                $model = new PengadaanListPengadaanInstansi;

                DB::transaction(function () use ($model, $response, $bar, $tahun) {
                    if (config('siasn-simpeg.truncate_model_before_pull')) {
                        $model->query()
                            ->where('periode', $tahun)
                            ->delete();
                    }

                    $response->chunk(config('siasn-simpeg.chunk_data'))->each(function ($item) use ($model, $bar) {
                        $model->upsert($item->toArray(), 'id');
                        $model->withTrashed()
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

                return self::FAILURE;
            }
        }

        $this->comment("Processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");

        return self::SUCCESS;
    }
}
