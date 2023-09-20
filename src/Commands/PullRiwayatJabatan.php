<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Api\Simpeg\Models\RiwayatJabatan;
use Kanekescom\Siasn\Simpeg\Repositories\RiwayatJabatanRepository;

class PullRiwayatJabatan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:pull-rw-jabatan
                            {nipBaru : NIP Baru}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull data from /pns/rw-jabatan/{nipBaru} endpoint on SIASN SIMPEG API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();

        DB::transaction(function () {
            $nip_baru = $this->argument('nipBaru');
            $repository = app(RiwayatJabatanRepository::class);
            $model = new RiwayatJabatan($nip_baru);

            if (blank($model)) {
                $this->error('Data not found!');
            }

            if (filled($model)) {
                $repository->query()
                    ->where('nip_baru', $nip_baru)
                    ->delete();

                $bar = $this->output->createProgressBar($model->count());
                $bar->start();

                $model->chunk(500)->each(function ($item) use ($repository, $bar) {
                    $repository->upsert($item->toArray(), 'id');
                    $repository->query()
                        ->onlyTrashed()
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
