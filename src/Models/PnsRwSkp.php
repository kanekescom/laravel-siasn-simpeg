<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kanekescom\Siasn\Referensi\Models\Golongan;
use Kanekescom\Siasn\Referensi\Models\JenisJabatan;

class PnsRwSkp extends Model
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
        'path' => 'array',
    ];

    public function getTable()
    {
        return 'siasn_simpeg_'.str(class_basename(__CLASS__))->snake();
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pns');
    }

    public function penilai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pejabatPenilai');
    }

    public function atasanPenilai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'atasanPejabatPenilai');
    }

    public function penilaiGolongan(): BelongsTo
    {
        return $this->belongsTo(Golongan::class, 'penilaiGolongan');
    }

    public function atasanPenilaiGolongan(): BelongsTo
    {
        return $this->belongsTo(Golongan::class, 'atasanPenilaiGolongan');
    }

    public function jenisJabatanR(): BelongsTo
    {
        return $this->belongsTo(JenisJabatan::class, 'jenisJabatan');
    }

    public function scopeNipBaru($query, $string)
    {
        return $query
            ->whereHas('pegawai', function ($query) use ($string) {
                $query->where('nip_baru', $string);
            });
    }

    public function scopeTahunOptions($query)
    {
        return $query
            ->distinct('tahun')
            ->select('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun', 'tahun');
    }
}
