<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function dataUtama(): HasOne
    {
        return $this->hasOne(PnsDataUtama::class, 'id');
    }

    public function angkakredits(): HasMany
    {
        return $this->hasMany(PnsRwAngkakredit::class, 'pns');
    }

    public function cltns(): HasMany
    {
        return $this->hasMany(PnsRwCltn::class, 'pnsOrangId');
    }

    public function diklats(): HasMany
    {
        return $this->hasMany(PnsRwDiklat::class, 'idPns');
    }

    public function dp3s(): HasMany
    {
        return $this->hasMany(PnsRwDp3::class, 'pnsId');
    }

    public function golongans(): HasMany
    {
        return $this->hasMany(PnsRwGolongan::class, 'idPns');
    }

    public function hukdises(): HasMany
    {
        return $this->hasMany(PnsRwHukdis::class, 'pnsOrang');
    }

    public function jabatans(): HasMany
    {
        return $this->hasMany(PnsRwJabatan::class, 'idPns');
    }

    public function kinerjaperiodiks(): HasMany
    {
        return $this->hasMany(PnsRwKinerjaperiodik::class, 'pnsDinilaiId');
    }

    public function kursuses(): HasMany
    {
        return $this->hasMany(PnsRwKursus::class, 'idPns');
    }

    public function masakerjas(): HasMany
    {
        return $this->hasMany(PnsRwMasakerja::class, 'idPns');
    }

    public function pemberhentians(): HasMany
    {
        return $this->hasMany(PnsRwPemberhentian::class, 'pnsOrang');
    }

    public function pendidikans(): HasMany
    {
        return $this->hasMany(PnsRwPendidikan::class, 'idPns');
    }

    public function penghargaans(): HasMany
    {
        return $this->hasMany(PnsRwPenghargaan::class, 'pnsOrangId');
    }

    public function pindahinstansis(): HasMany
    {
        return $this->hasMany(PnsRwPindahinstansi::class, 'pnsOrang');
    }

    public function pnsunors(): HasMany
    {
        return $this->hasMany(PnsRwPnsunor::class, 'pnsOrang');
    }

    public function pwks(): HasMany
    {
        return $this->hasMany(PnsRwPwk::class, 'pnsOrang');
    }

    public function skps(): HasMany
    {
        return $this->hasMany(PnsRwSkp::class, 'pns');
    }

    public function skp22s(): HasMany
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
}
