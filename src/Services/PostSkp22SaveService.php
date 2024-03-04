<?php

namespace Kanekescom\Siasn\Simpeg\Services;

class PostSkp22SaveService extends PostRiwayatBase
{
    protected $only = [
        'hasilKinerjaNilai',
        'id',
        'kuadranKinerjaNilai',
        'path',
        'penilaiGolongan',
        'penilaiJabatan',
        'penilaiNama',
        'penilaiNipNrp',
        'penilaiUnorNama',
        'perilakuKerjaNilai',
        'pnsDinilaiOrang',
        'statusPenilai',
        'tahun',
    ];

    protected $pushMethod = 'PostSkp22Save';

    protected $pullMethod = 'skp22';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
        ];
    }
}
