<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;
use Kanekescom\Siasn\Simpeg\Models\ReferensiRefUnor;

class PullReferensiRefUnorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-referensi-ref-unor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull referensi ref unor to database from endpoint on SIASN Simpeg API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $response = Simpeg::getReferensiRefUnor();
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

        return self::SUCCESS;
    }
}
