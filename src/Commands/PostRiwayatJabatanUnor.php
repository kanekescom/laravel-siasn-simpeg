<?php

namespace Kanekescom\Siasn\Simpeg\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Kanekescom\Siasn\Api\Facades\Siasn;
use Kanekescom\Siasn\Api\SiasnConfig;
use Kanekescom\Siasn\Api\Simpeg\Facades\Simpeg;
use Kanekescom\Siasn\Api\Simpeg\Models\RiwayatJabatan;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;
use Kanekescom\Siasn\Simpeg\Repositories\RiwayatJabatanRepository;

class PostRiwayatJabatanUnor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:post-rw-jabatan-unor
                            {--page=1 : Page Number}';

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
        $perPage = 100;
        $page = $this->option('page');
        $offset = ($page - 1) * $perPage;

        $model = Pegawai::query()
            ->select('nip_baru', 'nama', 'pns_id', 'unor_id', 'unor_nama')
            ->hasSimasnByNipBaruRefUnor()
            ->doesntHaveRefUnor()
            ->with([
                'simasnByNipBaruRefUnor',
                'lastRiwayatJabatan',
            ]);
        $total = $model->count();
        $data = $model
            ->offset($offset)
            ->limit($perPage)
            ->get();

        $i = $offset + 1;
        foreach ($data as $pegawai) {
            if ($pegawai->lastRiwayatJabatan) {
                $this->info("{$i}/{$total} {$pegawai->lastRiwayatJabatan->id}");
                $params = [
                    'eselonId' => $pegawai->lastRiwayatJabatan->eselon_id == '-' ? '' : $pegawai->lastRiwayatJabatan->eselon_id,
                    'id' => $pegawai->lastRiwayatJabatan->id,
                    'instansiId' => $pegawai->lastRiwayatJabatan->instansi_kerja_id,
                    'jabatanFungsionalId' => $pegawai->lastRiwayatJabatan->jabatan_fungsional_id,
                    'jabatanFungsionalUmumId' => $pegawai->lastRiwayatJabatan->jabatan_fungsional_umum_id,
                    'jenisJabatan' => $pegawai->lastRiwayatJabatan->jenis_jabatan,
                    'nomorSk' => $pegawai->lastRiwayatJabatan->nomor_sk ?: '-',
                    // 'path' => [
                    //   'dok_id' => 'string',
                    //   'dok_nama' => 'string',
                    //   'dok_uri' => 'string',
                    //   'object' => 'string',
                    //   'slug' => 'string'
                    // ],
                    // 'path' => $pegawai->lastRiwayatJabatan->path,
                    'pnsId' => $pegawai->pns_id,
                    'satuanKerjaId' => $pegawai->lastRiwayatJabatan->satuan_kerja_id,
                    'tanggalSk' => strtotime($pegawai->lastRiwayatJabatan->tanggal_sk) ? date('d-m-Y', strtotime($pegawai->lastRiwayatJabatan->tanggal_sk)) : '',
                    'tmtJabatan' => strtotime($pegawai->lastRiwayatJabatan->tmt_jabatan) ? date('d-m-Y', strtotime($pegawai->lastRiwayatJabatan->tmt_jabatan)) : '',
                    'tmtPelantikan' => strtotime($pegawai->lastRiwayatJabatan->tmt_pelantikan) ? date('d-m-Y', strtotime($pegawai->lastRiwayatJabatan->tmt_pelantikan)) : '',
                    'unorId' => $pegawai->simasnByNipBaruRefUnor->id,
                ];

                $response = Simpeg::post('/jabatan/save', $params)->object();

                if (optional($response)->success) {
                    // $this->info(json_encode($response, JSON_PRETTY_PRINT));
                } else {
                    $this->newLine();
                    $this->error(json_encode($response, JSON_PRETTY_PRINT));
                }
            } else {
                $this->newLine();
                $this->error(json_encode($pegawai, JSON_PRETTY_PRINT));
            }

            $i++;
        }

        $this->newLine();
        $this->comment("Processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");
    }
}
