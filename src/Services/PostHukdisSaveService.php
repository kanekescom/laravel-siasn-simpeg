<?php

namespace Kanekescom\Siasn\Simpeg\Services;

class PostHukdisSaveService extends PostRiwayatBase
{
    protected $only = [
        'akhirHukumanTanggal',
        'alasanHukumanDisiplinId',
        'golonganId',
        'golonganLama',
        'hukdisYangDiberhentikanId',
        'hukumanTanggal',
        'id',
        'jenisHukumanId',
        'jenisTingkatHukumanId',
        'kedudukanHukumId',
        'keterangan',
        'masaBulan',
        'masaTahun',
        'nomorPp',
        'path',
        'pnsOrangId',
        'skNomor',
        'skPembatalanNomor',
        'skPembatalanTanggal',
        'skTanggal',
    ];

    protected $pushMethod = 'PostHukdis';

    protected $pullMethod = 'hukdis';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
        ];
    }
}
