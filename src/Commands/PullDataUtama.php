<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Api\Simpeg\Models\DataUtama;
use Kanekescom\Siasn\Simpeg\Repositories\DataUtamaRepository;

class PullDataUtama extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-data-utama
                            {nipBaru : NIP Baru}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull data from /pns/data-utama/{nipBaru} endpoint on SIASN SIMPEG API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();

        DB::transaction(function () {
            $nip_baru = $this->argument('nipBaru');
            $repository = app(DataUtamaRepository::class);
            $model = new DataUtama($nip_baru);

            if (blank($model)) {
                $this->error('Data not found!');
            }

            if (filled($model)) {
                $repository->query()
                    ->where('nip_baru', $nip_baru)
                    ->delete();

                $repository->upsert($model->toArray(), 'id');

                $repository->query()
                    ->withTrashed()
                    ->whereIn('id', $model->pluck('id'))
                    ->restore();
            }
        });

        $this->newLine();
        $this->comment("Processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");
    }
}
