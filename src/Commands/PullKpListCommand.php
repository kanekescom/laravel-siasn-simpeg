<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Http\Client\Kp;
use Kanekescom\Siasn\Simpeg\Models\PnsListKpInstansi;

class PullKpListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-kp-list
                            {periode : periode}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull kp list to database from endpoint on SIASN SIMPEG API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();
        $periode = $this->argument('periode');
        $query = [
            'periode' => $periode,
        ];

        try {
            $response = Kp::getList([], $query);
        } catch (\Exception $e) {
            $this->error($e);
            $this->newLine();

            return self::FAILURE;
        }

        if ($response->count()) {
            try {
                $bar = $this->output->createProgressBar($response->count());
                $bar->start();

                $model = new PnsListKpInstansi;

                DB::transaction(function () use ($model, $response, $bar, $periode) {
                    if (config('siasn-simpeg.truncate_model_before_pull')) {
                        $model->query()
                            ->whereDate('tmtKp_', $periode)
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
