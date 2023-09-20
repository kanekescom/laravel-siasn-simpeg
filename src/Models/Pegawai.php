<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pegawai extends Model implements Transformable
{
    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siasn_simpeg_pegawai';

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pns_id',
        'nip_baru',
        'nip_lama',
        'nama',
        'gelar_depan',
        'gelar_belakang',
        'tempat_lahir_id',
        'tempat_lahir_nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama_id',
        'agama_nama',
        'jenis_kawin_id',
        'jenis_kawin_nama',
        'nik',
        'nomor_hp',
        'email',
        'email_gov',
        'alamat',
        'npwp_nomor',
        'bpjs',
        'jenis_pegawai_id',
        'jenis_pegawai_nama',
        'kedudukan_hukum_id',
        'kedudukan_hukum_nama',
        'status_cpns_pns',
        'kartu_asn_virtual',
        'nomor_sk_cpns',
        'tanggal_sk_cpns',
        'tmt_cpns',
        'nomor_sk_pns',
        'tanggal_sk_pns',
        'tmt_pns',
        'gol_awal_id',
        'gol_awal_nama',
        'gol_akhir_id',
        'gol_akhir_nama',
        'tmt_golongan',
        'mk_tahun',
        'mk_bulan',
        'jenis_jabatan_id',
        'jenis_jabatan_nama',
        'jabatan_id',
        'jabatan_nama',
        'tmt_jabatan',
        'tingkat_pendidikan_id',
        'tingkat_pendidikan_nama',
        'pendidikan_id',
        'pendidikan_nama',
        'tahun_lulus',
        'kpkn_id',
        'kpkn_nama',
        'lokasi_kerja_id',
        'lokasi_kerja_nama',
        'unor_id',
        'unor_nama',
        'instansi_induk_id',
        'instansi_induk_nama',
        'instansi_kerja_id',
        'instansi_kerja_nama',
        'satuan_kerja_induk_id',
        'satuan_kerja_induk_nama',
        'satuan_kerja_kerja_id',
        'satuan_kerja_kerja_nama',
    ];

    /**
     * Get the ReferensiUnor that owns the Pegawai.
     */
    public function refUnor()
    {
        return $this->belongsTo(ReferensiUnor::class, 'unor_id', 'id');
    }

    /**
     * Get the ReferensiUnor that owns the Pegawai.
     */
    public static function doesntHaveRefUnor()
    {
        return (new static)->doesntHave('refUnor');
    }
}
