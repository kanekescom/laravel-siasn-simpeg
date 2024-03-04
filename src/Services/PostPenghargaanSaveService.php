<?php

namespace Kanekescom\Siasn\Simpeg\Services;

class PostPenghargaanSaveService extends PostRiwayatBase
{
    protected $only = [
        'hargaId',
        'id',
        'path',
        'pnsOrangId',
        'skDate',
        'skNomor',
        'tahun',
    ];

    protected $pushMethod = 'PostPenghargaan';

    protected $pullMethod = 'penghargaan';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
        ];
    }
}
