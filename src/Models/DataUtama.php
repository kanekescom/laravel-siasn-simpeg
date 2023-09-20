<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DataUtama extends Model implements Transformable
{
    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siasn_simpeg_data_utama';

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
        'nip_baru',
        'nip_lama',
        'nama',
        'gelar_depan',
        'gelar_belakang',
        'tempat_lahir',
        'tempat_lahir_id',
        'tgl_lahir',
        'agama',
        'agama_id',
        'email',
        'email_gov',
        'nik',
        'alamat',
        'no_hp',
        'no_telp',
        'jenis_pegawai_id',
        'mk_tahun',
        'mk_bulan',
        'jenis_pegawai_nama',
        'kedudukan_pns_id',
        'kedudukan_pns_nama',
        'status_pegawai',
        'jenis_kelamin',
        'jenis_id_dokumen_id',
        'jenis_id_dokumen_nama',
        'nomor_id_document',
        'no_seri_karpeg',
        'tk_pendidikan_terakhir_id',
        'tk_pendidikan_terakhir',
        'pendidikan_terakhir_id',
        'pendidikan_terakhir_nama',
        'tahun_lulus',
        'tmt_pns',
        'tmt_pensiun',
        'bup_pensiun',
        'tgl_sk_pns',
        'tmt_cpns',
        'tgl_sk_cpns',
        'instansi_induk_id',
        'instansi_induk_nama',
        'satuan_kerja_induk_id',
        'satuan_kerja_induk_nama',
        'kanreg_id',
        'kanreg_nama',
        'instansi_kerja_id',
        'instansi_kerja_nama',
        'instansi_kerja_kode_cepat',
        'satuan_kerja_kerja_id',
        'satuan_kerja_kerja_nama',
        'unor_id',
        'unor_nama',
        'unor_induk_id',
        'unor_induk_nama',
        'jenis_jabatan_id',
        'jenis_jabatan',
        'jabatan_nama',
        'jabatan_struktural_id',
        'jabatan_struktural_nama',
        'jabatan_fungsional_id',
        'jabatan_fungsional_nama',
        'jabatan_fungsional_umum_id',
        'jabatan_fungsional_umum_nama',
        'tmt_jabatan',
        'lokasi_kerja_id',
        'lokasi_kerja',
        'gol_ruang_awal_id',
        'gol_ruang_awal',
        'gol_ruang_akhir_id',
        'gol_ruang_akhir',
        'tmt_gol_akhir',
        'masa_kerja',
        'eselon',
        'eselon_id',
        'eselon_level',
        'tmt_eselon',
        'gaji_pokok',
        'kpkn_id',
        'kpkn_nama',
        'ktua_id',
        'ktua_nama',
        'taspen_id',
        'taspen_nama',
        'jenis_kawin_id',
        'status_perkawinan',
        'status_hidup',
        'tgl_surat_keterangan_dokter',
        'no_surat_keterangan_dokter',
        'jumlah_istri_suami',
        'jumlah_anak',
        'no_surat_keterangan_bebas_narkoba',
        'tgl_surat_keterangan_bebas_narkoba',
        'skck',
        'tgl_skck',
        'akte_kelahiran',
        'akte_meninggal',
        'tgl_meninggal',
        'no_npwp',
        'tgl_npwp',
        'no_askes',
        'bpjs',
        'kode_pos',
        'no_spmt',
        'no_taspen',
        'bahasa',
        'kppn_id',
        'kppn_nama',
        'pangkat_akhir',
        'tgl_sttpl',
        'nomor_sttpl',
        'nomor_sk_cpns',
        'nomor_sk_pns',
        'jenjang',
        'jabatan_asn',
        'kartu_asn',
    ];

    public function refUnor()
    {
        return $this->belongsTo(ReferensiUnor::class, 'unor_id', 'id');
    }

    public function scopeHasRefUnor($query)
    {
        $query->has('refUnor');
    }

    public function scopeDoesntHaveRefUnor($query)
    {
        $query->doesntHave('refUnor');
    }
}
