<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kanekescom\Siasn\Referensi\Models\Instansi;
use Kanekescom\Siasn\Referensi\Models\Lokasi;
use Kanekescom\Siasn\Referensi\Models\SatuanKerja;

class PnsRwPwk extends Model
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
        return $this->belongsTo(Pegawai::class, 'pnsOrang');
    }

    public function instansiR(): BelongsTo
    {
        return $this->belongsTo(Instansi::class, 'instansi');
    }

    public function lokasiKerjaBaruR(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class, 'lokasiKerjaBaru');
    }

    public function unorBaruR(): BelongsTo
    {
        return $this->belongsTo(ReferensiRefUnor::class, 'unorBaru');
    }

    public function satuanKerjaR(): BelongsTo
    {
        return $this->belongsTo(SatuanKerja::class, 'satuanKerja');
    }

    public function scopeNipBaru($query, $string)
    {
        return $query
            ->whereHas('pegawai', function ($query) use ($string) {
                $query->where('nip_baru', $string);
            });
    }
}
