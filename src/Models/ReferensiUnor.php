<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ReferensiUnor extends Model implements Transformable
{
    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siasn_simpeg_referensi_unor';

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
        'instansi_id',
        'diatasan_id',
        'eselon_id',
        'nama_unor',
        'nama_jabatan',
        'cepat_kode',
        'induk_unor_id',
        'pemimpin_pns_id',
        'jenis_unor_id',
    ];

    /**
     * Get the Pegawai for the ReferensiUnor.
     */
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'unor_id', 'id');
    }

    /**
     * Get the DataUtama for the ReferensiUnor.
     */
    public function dataUtamas()
    {
        return $this->hasMany(DataUtama::class, 'unor_id', 'id');
    }
}
