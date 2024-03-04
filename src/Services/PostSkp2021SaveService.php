<?php

namespace Kanekescom\Siasn\Simpeg\Services;

class PostSkp2021SaveService extends PostRiwayatBase
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
        'inisiatifKerja',
        'integritas',
        'jenisJabatan',
        'jenisPeraturanKinerjaKd',
        'jumlah',
        'kepemimpinan',
        'kerjasama',
        'komitmen',
        'konversiNilai',
        'nilaiIntegrasi',
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
        'statusAtasanPenilai',
        'statusPenilai',
        'tahun',
    ];

    protected $pushMethod = 'PostSkp2021';

    protected $pullMethod = 'skp';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
        ];
    }
}
