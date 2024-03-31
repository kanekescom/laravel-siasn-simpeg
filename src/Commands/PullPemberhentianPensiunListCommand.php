<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Models\PnsListPensiunInstansi;
use Kanekescom\Siasn\Simpeg\Pemberhentian;

class PullPemberhentianPensiunListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-pemberhentian-pensiun-list
                            {tahun : tahun}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull pemberhentian pensiun list to database from endpoint on SIASN SIMPEG API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();
        $tahun = $this->argument('tahun');
        $query = [
            'tglAwal' => "01-01-{$tahun}",
            'tglAkhir' => "31-12-{$tahun}",
        ];

        try {
            $response = Pemberhentian::getPensiunList([], $query);
        } catch (\Exception $e) {
            $this->error($e);
            $this->newLine();

            return self::FAILURE;
        }

        if ($response->count()) {
            try {
                $bar = $this->output->createProgressBar($response->count());
                $bar->start();

                $model = new PnsListPensiunInstansi;

                DB::transaction(function () use ($model, $response, $bar, $tahun) {
                    if (config('siasn-simpeg.truncate_model_before_pull')) {
                        $model->query()
                            ->whereYear('tmtPensiun_', $tahun)
                            ->delete();
                    }

                    $response->chunk(config('siasn-simpeg.chunk_data'))->each(function ($item) use ($model, $bar) {
                        $model->upsert($item->toArray(), 'Id');
                        $model->withTrashed()
                            ->whereIn('Id', $item->pluck('Id'))
                            ->restore();

                        $bar->advance($item->count());
                    });
                });

                $bar->finish();

                $this->newLine(2);

                $this->comment("Processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");
            } catch (\Exception $e) {
                $this->error($e);
                $this->newLine();

                return self::FAILURE;
            }
        }

        return self::SUCCESS;
    }
}
