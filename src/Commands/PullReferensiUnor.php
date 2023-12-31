<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Api\Simpeg\Models\ReferensiUnor;
use Kanekescom\Siasn\Simpeg\Repositories\ReferensiUnorRepository;

class PullReferensiUnor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-ref-unor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull data from /referensi/ref-unor endpoint on SIASN SIMPEG API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();

        DB::transaction(function () {
            $repository = app(ReferensiUnorRepository::class);
            $model = new ReferensiUnor;

            if (blank($model)) {
                $this->error('Data not found!');
            }

            if (filled($model)) {
                $repository->query()
                    ->delete();

                $bar = $this->output->createProgressBar($model->count());
                $bar->start();

                $model->chunk(500)->each(function ($item) use ($repository, $bar) {
                    $repository->upsert($item->toArray(), 'id');
                    $repository->query()
                        ->withTrashed()
                        ->whereIn('id', $item->pluck('id'))
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
