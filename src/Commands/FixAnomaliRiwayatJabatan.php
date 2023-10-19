<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;

class FixAnomaliRiwayatJabatan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:fix-anomali-riwayat-jabatan
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

        $data = Pegawai::query()
            ->hasSimasnByNipBaruRefUnor()
            ->doesntHaveRefUnor()
            ->with('simasnByNipBaruRefUnor')
            ->with('lastRiwayatJabatan')
            ->where('nip_baru', $this->argument('nipBaru'))
            ->get();

        dd($data->count());


        $post = Simpeg::post('/jabatan/save', $params);

        $this->newLine();
        $this->comment("Processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");
    }
}
