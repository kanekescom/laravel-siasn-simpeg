<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RiwayatJabatan extends Model implements Transformable
{
    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siasn_simpeg_riwayat_jabatan';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'id_pns',
        'nip_baru',
        'nip_lama',
        'jenis_jabatan',
        'instansi_kerja_id',
        'instansi_kerja_nama',
        'satuan_kerja_id',
        'satuan_kerja_nama',
        'unor_id',
        'unor_nama',
        'unor_induk_id',
        'unor_induk_nama',
        'eselon',
        'eselon_id',
        'jabatan_fungsional_id',
        'jabatan_fungsional_nama',
        'jabatan_fungsional_umum_id',
        'jabatan_fungsional_umum_nama',
        'tmt_jabatan',
        'nomor_sk',
        'tanggal_sk',
        'nama_unor',
        'nama_jabatan',
        'tmt_pelantikan',
        'path',
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'id_pns', 'id');
    }

    public function refUnor()
    {
        return $this->belongsTo(ReferensiUnor::class, 'unor_id', 'id');
    }

    public function scopeDoesntHaveRefUnor($query)
    {
        $query->doesntHave('refUnor');
    }
}
