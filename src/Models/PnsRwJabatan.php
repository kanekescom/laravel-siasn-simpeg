<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kanekescom\Siasn\Referensi\Enums\JenisJabatanEnum;
use Kanekescom\Siasn\Referensi\Models\Eselon;
use Kanekescom\Siasn\Referensi\Models\JabatanFungsional;
use Kanekescom\Siasn\Referensi\Models\JabatanFungsionalUmum;

class PnsRwJabatan extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'jenisJabatan' => JenisJabatanEnum::class,
        'path' => 'array',
    ];

    public function getTable()
    {
        return 'siasn_simpeg_'.str(class_basename(__CLASS__))->snake();
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'idPns');
    }

    public function eselon(): BelongsTo
    {
        return $this->belongsTo(Eselon::class, 'eselonId');
    }

    public function jabatanFungsional(): BelongsTo
    {
        return $this->belongsTo(JabatanFungsional::class, 'jabatanFungsionalId');
    }

    public function jabatanFungsionalUmum(): BelongsTo
    {
        return $this->belongsTo(JabatanFungsionalUmum::class, 'jabatanFungsionalUmumId');
    }

    public function unor(): BelongsTo
    {
        return $this->belongsTo(ReferensiRefUnor::class, 'unorId');
    }
}
