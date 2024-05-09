<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kanekescom\Siasn\Referensi\Models\Instansi;
use Kanekescom\Siasn\Referensi\Models\JabatanFungsional;
use Kanekescom\Siasn\Referensi\Models\JabatanFungsionalUmum;
use Kanekescom\Siasn\Referensi\Models\JenisJabatan;
use Kanekescom\Siasn\Referensi\Models\Lokasi;
use Kanekescom\Siasn\Referensi\Models\SatuanKerja;

class PnsRwPindahinstansi extends Model
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

    public function jabatanFungsionalUmumBaruR(): BelongsTo
    {
        return $this->belongsTo(JabatanFungsionalUmum::class, 'jabatanFungsionalUmumBaru');
    }

    public function jabatanFungsionalLamaR(): BelongsTo
    {
        return $this->belongsTo(JabatanFungsional::class, 'jabatanFungsionalLama');
    }

    public function jabatanFungsionalBaruR(): BelongsTo
    {
        return $this->belongsTo(JabatanFungsional::class, 'jabatanFungsionalBaru');
    }

    public function jenisJabatanLamaR(): BelongsTo
    {
        return $this->belongsTo(JenisJabatan::class, 'jenisJabatanLama');
    }

    public function jenisJabatanBaruR(): BelongsTo
    {
        return $this->belongsTo(JenisJabatan::class, 'jenisJabatanBaru');
    }

    public function instansiKerjaLamaR(): BelongsTo
    {
        return $this->belongsTo(Instansi::class, 'instansiKerjaLama');
    }

    public function instansiKerjaBaruR(): BelongsTo
    {
        return $this->belongsTo(Instansi::class, 'instansiKerjaBaru');
    }

    public function instansiIndukLamaR(): BelongsTo
    {
        return $this->belongsTo(Instansi::class, 'instansiIndukLama');
    }

    public function instansiIndukBaruR(): BelongsTo
    {
        return $this->belongsTo(Instansi::class, 'instansiIndukBaru');
    }

    public function satuanKerjaLamaR(): BelongsTo
    {
        return $this->belongsTo(SatuanKerja::class, 'satuanKerjaLama');
    }

    public function satuanKerjaBaruR(): BelongsTo
    {
        return $this->belongsTo(SatuanKerja::class, 'satuanKerjaBaru');
    }

    public function satuanKerjaIndukLamaR(): BelongsTo
    {
        return $this->belongsTo(SatuanKerja::class, 'satuanKerjaIndukLama');
    }

    public function satuanKerjaIndukBaruR(): BelongsTo
    {
        return $this->belongsTo(SatuanKerja::class, 'satuanKerjaIndukBaru');
    }

    public function lokasiKerjaLamaR(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class, 'lokasiKerjaLama');
    }

    public function lokasiKerjaBaruR(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class, 'lokasiKerjaBaru');
    }

    public function unorLamaR(): BelongsTo
    {
        return $this->belongsTo(ReferensiRefUnor::class, 'unorLama');
    }

    public function unorBaruR(): BelongsTo
    {
        return $this->belongsTo(ReferensiRefUnor::class, 'unorBaru');
    }

    public function scopeJenisPiOptions($query)
    {
        return $query
            ->distinct('jenisPi')
            ->select('jenisPi')
            ->orderBy('jenisPi')
            ->pluck('jenisPi', 'jenisPi');
    }
}
