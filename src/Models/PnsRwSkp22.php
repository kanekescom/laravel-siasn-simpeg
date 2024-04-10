<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kanekescom\Siasn\Referensi\Models\Golongan;

class PnsRwSkp22 extends Model
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
        return $this->belongsTo(Pegawai::class, 'pnsDinilaiId');
    }

    public function penilaiGolongan(): BelongsTo
    {
        return $this->belongsTo(Golongan::class, 'penilaiGolonganId');
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

    public function scopeHasilKinerjajaOptions($query)
    {
        return $query
            ->distinct('hasilKinerja')
            ->select('hasilKinerja', 'hasilKinerjaNilai')
            ->orderBy('hasilKinerjaNilai')
            ->pluck('hasilKinerja', 'hasilKinerja');
    }

    public function scopePerilakuKerjaOptions($query)
    {
        return $query
            ->distinct('perilakuKerja')
            ->select('perilakuKerja', 'perilakuKerjaNilai')
            ->orderBy('perilakuKerjaNilai')
            ->pluck('perilakuKerja', 'perilakuKerja');
    }

    public function scopeKuadranKinerjaOptions($query)
    {
        return $query
            ->distinct('kuadranKinerja')
            ->select('kuadranKinerja', 'kuadranKinerjaNilai')
            ->orderBy('kuadranKinerjaNilai')
            ->pluck('kuadranKinerja', 'kuadranKinerja');
    }
}
