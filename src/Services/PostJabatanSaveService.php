<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Kanekescom\Siasn\Referensi\Models\Eselon;
use Kanekescom\Siasn\Simpeg\Models\PnsRwJabatan;

class PostJabatanSaveService extends PostRiwayatService
{
    protected $data;

    protected $record;

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

    protected $response;

    protected $nipBaru;

    protected $riwayat = 'pns-rw-jabatan';

    public function __construct(array $data, PnsRwJabatan $record, $nipBaru = null)
    {
        $data['instansiId'] = config('siasn-api.const.instansi_id');
        $data['satuanKerjaId'] = config('siasn-api.const.satuan_kerja_id');
        $data['pnsId'] = $record->idPns;
        $data['eselonId'] = Eselon::find($record->eselonId)?->id;
        $record->path = array_values($record->path);

        $this->data = $data;
        $this->record = $record;
        $this->nipBaru = $nipBaru;
    }
}
