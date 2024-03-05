<?php

namespace Kanekescom\Siasn\Simpeg\Services;

class PostKursusSaveService extends PostRiwayatBase
{
    protected $only = [
        'id',
        'instansiId',
        'institusiPenyelenggara',
        'jenisDiklatId',
        'jenisKursus',
        'jenisKursusSertipikat',
        'jumlahJam',
        'lokasiId',
        'namaKursus',
        'nomorSertipikat',
        'path',
        'pnsOrangId',
        'tahunKursus',
        'tanggalKursus',
        'tanggalSelesaiKursus',
    ];

    protected $pushMethod = 'PostKursus';

    protected $pullMethod = 'kursus';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
        ];
    }
}
