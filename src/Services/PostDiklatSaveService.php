<?php

namespace Kanekescom\Siasn\Simpeg\Services;

class PostDiklatSaveService extends PostRiwayatBase
{
    protected $only = [
        'bobot',
        'id',
        'institusiPenyelenggara',
        'jenisKompetensi',
        'jumlahJam',
        'latihanStrukturalId',
        'nomor',
        'path',
        'pnsOrangId',
        'tahun',
        'tanggal',
        'tanggalSelesai',
    ];

    protected $pushMethod = 'PostDiklat';

    protected $pullMethod = 'diklat';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
        ];
    }
}
