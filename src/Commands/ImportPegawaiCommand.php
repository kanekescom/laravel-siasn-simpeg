<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Kanekescom\Siasn\Simpeg\Imports\PegawaiImport;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;

class ImportPegawaiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:import-pegawai
                            {filePath : File path}
                            {--truncate : Truncate data before run import}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import pegawai to database via csv file exported from SIASN Export Data ASN';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();
        $path_file = $this->argument('filePath');
        $truncate = $this->option('truncate');

        if ($truncate) {
            (new Pegawai)->query()->delete();
        }

        (new PegawaiImport)->withOutput($this->output)->import($path_file);

        $this->comment("Processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");

        return self::SUCCESS;
    }
}
