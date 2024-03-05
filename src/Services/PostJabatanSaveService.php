<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Kanekescom\Siasn\Referensi\Models\Eselon;

class PostJabatanSaveService extends PostRiwayatBase
{
    protected $only = [
        'eselonId',
        'id',
        'instansiId',
        'jabatanFungsionalId',
        'jabatanFungsionalUmumId',
        'jenisJabatan',
        'nomorSk',
        'path',
        'pnsId',
        'satuanKerjaId',
        'tanggalSk',
        'tmtJabatan',
        'tmtPelantikan',
        'unorId',
    ];

    protected $pushMethod = 'postJabatanSave';

    protected $pullMethod = 'jabatan';

    protected function transform(array $data = [])
    {
        return [
            'instansiId' => config('siasn-api.const.instansi_id'),
            'satuanKerjaId' => config('siasn-api.const.satuan_kerja_id'),
            'pnsId' => $this->record->idPns,
            'eselonId' => Eselon::find($this->record->eselonId)?->id,
        ];
    }
}
