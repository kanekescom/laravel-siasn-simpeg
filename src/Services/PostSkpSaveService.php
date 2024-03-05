<?php

namespace Kanekescom\Siasn\Simpeg\Services;

class PostSkpSaveService extends PostRiwayatBase
{
    protected $only = [
        'atasanPejabatPenilai',
        'atasanPenilaiGolongan',
        'atasanPenilaiJabatan',
        'atasanPenilaiNama',
        'atasanPenilaiNipNrp',
        'atasanPenilaiTmtGolongan',
        'atasanPenilaiUnorNama',
        'disiplin',
        'id',
        'integritas',
        'jenisJabatan',
        'jumlah',
        'kepemimpinan',
        'kerjasama',
        'komitmen',
        'nilaiPerilakuKerja',
        'nilaiPrestasiKerja',
        'nilaiSkp',
        'nilairatarata',
        'orientasiPelayanan',
        'pejabatPenilai',
        'penilaiGolongan',
        'penilaiJabatan',
        'penilaiNama',
        'penilaiNipNrp',
        'penilaiTmtGolongan',
        'penilaiUnorNama',
        'pnsDinilaiOrang',
        'pnsUserId',
        'statusAtasanPenilai',
        'statusPenilai',
        'tahun',
    ];

    protected $pushMethod = 'PostSkp';

    protected $pullMethod = 'skp';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
        ];
    }
}
