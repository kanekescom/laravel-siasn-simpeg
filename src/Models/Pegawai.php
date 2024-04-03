<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kanekescom\Siasn\Referensi\Models\Golongan;
use Kanekescom\Siasn\Referensi\Models\JenisJabatan;
use Kanekescom\Siasn\Referensi\Models\KedudukanHukum;
use Kanekescom\Siasn\Referensi\Models\Lokasi;
use Kanekescom\Siasn\Referensi\Models\Pendidikan;
use Kanekescom\Siasn\Referensi\Models\TingkatPendidikan;

class Pegawai extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'pns_id';

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

    public function getNamaGelarAttribute()
    {
        return ($this->gelar_depan ? "{$this->gelar_depan} " : '')
            .$this->nama
            .($this->gelar_belakang ? ", {$this->gelar_belakang}" : '');
    }

    public function getTtlAttribute()
    {
        return $this->tempat_lahir_nama
            .', '.$this->tanggal_lahir;
    }

    public function golongan(): BelongsTo
    {
        return $this->belongsTo(Golongan::class, 'gol_akhir_id');
    }

    public function kedudukanHukum(): BelongsTo
    {
        return $this->belongsTo(KedudukanHukum::class, 'kedudukan_hukum_id');
    }

    public function jenisJabatan(): BelongsTo
    {
        return $this->belongsTo(JenisJabatan::class, 'jenis_jabatan_id');
    }

    public function tingkatPendidikan(): BelongsTo
    {
        return $this->belongsTo(TingkatPendidikan::class, 'tingkat_pendidikan_id');
    }

    public function pendidikan(): BelongsTo
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }

    public function lokasiKerja(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_kerja_id');
    }

    public function unor(): BelongsTo
    {
        return $this->belongsTo(ReferensiRefUnor::class, 'unor_id');
    }

    public function pengadaan(): HasOne
    {
        return $this->hasOne(PengadaanListPengadaanInstansi::class, 'orang_id');
    }

    public function dataUtama(): HasOne
    {
        return $this->hasOne(PnsDataUtama::class, 'id');
    }

    public function rwAngkakredits(): HasMany
    {
        return $this->hasMany(PnsRwAngkakredit::class, 'pns');
    }

    public function rwCltns(): HasMany
    {
        return $this->hasMany(PnsRwCltn::class, 'pnsOrangId');
    }

    public function rwDiklats(): HasMany
    {
        return $this->hasMany(PnsRwDiklat::class, 'idPns');
    }

    public function rwDp3s(): HasMany
    {
        return $this->hasMany(PnsRwDp3::class, 'pnsId');
    }

    public function rwGolongans(): HasMany
    {
        return $this->hasMany(PnsRwGolongan::class, 'idPns');
    }

    public function rwHukdises(): HasMany
    {
        return $this->hasMany(PnsRwHukdis::class, 'pnsOrang');
    }

    public function rwJabatans(): HasMany
    {
        return $this->hasMany(PnsRwJabatan::class, 'idPns');
    }

    public function rwKinerjaperiodiks(): HasMany
    {
        return $this->hasMany(PnsRwKinerjaperiodik::class, 'pnsDinilaiId');
    }

    public function rwKursuses(): HasMany
    {
        return $this->hasMany(PnsRwKursus::class, 'idPns');
    }

    public function rwMasakerjas(): HasMany
    {
        return $this->hasMany(PnsRwMasakerja::class, 'idPns');
    }

    public function rwPemberhentians(): HasMany
    {
        return $this->hasMany(PnsRwPemberhentian::class, 'pnsOrang');
    }

    public function rwPendidikans(): HasMany
    {
        return $this->hasMany(PnsRwPendidikan::class, 'idPns');
    }

    public function rwPenghargaans(): HasMany
    {
        return $this->hasMany(PnsRwPenghargaan::class, 'pnsOrangId');
    }

    public function rwPindahinstansis(): HasMany
    {
        return $this->hasMany(PnsRwPindahinstansi::class, 'pnsOrang');
    }

    public function rwPnsunors(): HasMany
    {
        return $this->hasMany(PnsRwPnsunor::class, 'pnsOrang');
    }

    public function rwPwks(): HasMany
    {
        return $this->hasMany(PnsRwPwk::class, 'pnsOrang');
    }

    public function rwSkps(): HasMany
    {
        return $this->hasMany(PnsRwSkp::class, 'pns');
    }

    public function rwSkp22s(): HasMany
    {
        return $this->hasMany(PnsRwSkp22::class, 'pnsDinilaiId');
    }

    public function scopePns($query)
    {
        return $query
            ->whereNotIn('kedudukan_hukum_id', [71, 72, 73]);
    }

    public function scopePppk($query)
    {
        return $query
            ->whereIn('kedudukan_hukum_id', [71, 72, 73]);
    }

    public function scopeMale($query)
    {
        return $query
            ->where('jenis_kelamin', 'M');
    }

    public function scopeFemale($query)
    {
        return $query
            ->where('jenis_kelamin', 'F');
    }
}
