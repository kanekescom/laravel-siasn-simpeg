<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Http\Client\Referensi;
use Kanekescom\Siasn\Simpeg\Models\ReferensiRefUnor;

class PullReferensiUnorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-referensi-unor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull referensi ref unor to database from endpoint on SIASN SIMPEG API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();

        try {
            $response = Referensi::getUnor();
        } catch (\Exception $e) {
            $this->error($e);
            $this->newLine();

            return self::FAILURE;
        }

        if ($response->count()) {
            try {
                $bar = $this->output->createProgressBar($response->count());
                $bar->start();

                $model = new ReferensiRefUnor;

                DB::transaction(function () use ($model, $response, $bar) {
                    if (config('siasn-simpeg.truncate_model_before_pull')) {
                        $model->delete();
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
