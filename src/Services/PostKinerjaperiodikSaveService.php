<?php

namespace Kanekescom\Siasn\Simpeg\Services;

class PostKinerjaperiodikSaveService extends PostRiwayatBase
{
    protected $only = [
        'bulanMulaiPenilaian',
        'bulanSelesaiPenilaian',
        'hasilKinerjaNilai',
        'id',
        'koefisienId',
        'kuadranKinerjaNilai',
        'path',
        'penilaiGolongan',
        'penilaiJabatanNama',
        'penilaiNama',
        'penilaiNipNrp',
        'penilaiUnorNama',
        'perilakuKerjaNilai',
        'periodikId',
        'pnsDinilaiId',
        'statusPenilai',
        'tahun',
        'tahunMulaiPenilaian',
        'tahunSelesaiPenilaian',
    ];

    protected $pushMethod = 'PostKinerjaperiodik';

    protected $pullMethod = 'kinerjaperiodik';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
        ];
    }
}
