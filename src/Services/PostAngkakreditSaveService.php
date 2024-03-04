<?php

namespace Kanekescom\Siasn\Simpeg\Services;

class PostAngkakreditSaveService extends PostRiwayatBase
{
    protected $only = [
        'bulanMulaiPenailan',
        'bulanSelesaiPenailan',
        'id',
        'isAngkaKreditPertama',
        'isIntegrasi',
        'isKonversi',
        'kreditBaruTotal',
        'kreditPenunjangBaru',
        'kreditUtamaBaru',
        'nomorSk',
        'path',
        'pnsId',
        'rwJabatanId',
        'tahunMulaiPenailan',
        'tahunSelesaiPenailan',
        'tanggalSk',
    ];

    protected $pushMethod = 'PostAngkakreditSave';

    protected $pullMethod = 'angkakredit';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
        ];
    }
}
