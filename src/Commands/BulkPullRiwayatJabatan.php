<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Kanekescom\Siasn\Simpeg\Repositories\PegawaiRepository;

class BulkPullRiwayatJabatan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:bulk-pull-rw-jabatan
                            {--skip=0 : Skip Number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bulk pull data from /pns/rw-jabatan/{nipBaru} endpoint on SIASN SIMPEG API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();
        $skip = $this->option('skip');
        $command = 'siasn-simpeg:pull-rw-jabatan';
        $repository = app(PegawaiRepository::class);
        $repositoryNumber = $repository->count();

        if (blank($repository)) {
            $this->error('Data not found!');
        }

        if (filled($repository)) {
            $i = $skip + 1;

            $repository->all()->skip($skip)->chunk(500)->each(function ($item) use ($command, $repositoryNumber, &$i) {
                $item->each(function ($item) use ($command, $repositoryNumber, &$i) {
                    $this->info("{$i}/{$repositoryNumber} Running {$command}/{$item->nip_baru} command...");
                    $this->call($command, ['nipBaru' => $item->nip_baru]);
                    $this->newLine();

                    $i++;
                });
            });
        }

        $this->newLine();
        $this->comment("Processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");
    }
}
