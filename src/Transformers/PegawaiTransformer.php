<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use Kanekescom\Siasn\Simpeg\Models\Pegawai;
use League\Fractal\TransformerAbstract;

class PegawaiTransformer extends TransformerAbstract
{
    /**
     * Transform the Pegawai model.
     *
     * @param  Kanekescom\Siasn\Simpeg\Models\Pegawai  $model
     */
    public function transform(Pegawai $model): array
    {
        return [
            'id' => $model->id,

            /* place your other model properties here */
            'pns_id' => $model->pns_id,
            'nip_baru' => $model->nip_baru,
            'nip_lama' => $model->nip_lama,
            'nama' => $model->nama,
            'gelar_depan' => $model->gelar_depan,
            'gelar_belakang' => $model->gelar_belakang,
            'tempat_lahir_id' => $model->tempat_lahir_id,
            'tempat_lahir_nama' => $model->tempat_lahir_nama,
            'tanggal_lahir' => $model->tanggal_lahir,
            'jenis_kelamin' => $model->jenis_kelamin,
            'agama_id' => $model->agama_id,
            'agama_nama' => $model->agama_nama,
            'jenis_kawin_id' => $model->jenis_kawin_id,
            'jenis_kawin_nama' => $model->jenis_kawin_nama,
            'nik' => $model->nik,
            'nomor_hp' => $model->nomor_hp,
            'email' => $model->email,
            'email_gov' => $model->email_gov,
            'alamat' => $model->alamat,
            'npwp_nomor' => $model->npwp_nomor,
            'bpjs' => $model->bpjs,
            'jenis_pegawai_id' => $model->jenis_pegawai_id,
            'jenis_pegawai_nama' => $model->jenis_pegawai_nama,
            'kedudukan_hukum_id' => $model->kedudukan_hukum_id,
            'kedudukan_hukum_nama' => $model->kedudukan_hukum_nama,
            'status_cpns_pns' => $model->status_cpns_pns,
            'kartu_asn_virtual' => $model->kartu_asn_virtual,
            'nomor_sk_cpns' => $model->nomor_sk_cpns,
            'tanggal_sk_cpns' => $model->tanggal_sk_cpns,
            'tmt_cpns' => $model->tmt_cpns,
            'nomor_sk_pns' => $model->nomor_sk_pns,
            'tanggal_sk_pns' => $model->tanggal_sk_pns,
            'tmt_pns' => $model->tmt_pns,
            'gol_awal_id' => $model->gol_awal_id,
            'gol_awal_nama' => $model->gol_awal_nama,
            'gol_akhir_id' => $model->gol_akhir_id,
            'gol_akhir_nama' => $model->gol_akhir_nama,
            'tmt_golongan' => $model->tmt_golongan,
            'mk_tahun' => $model->mk_tahun,
            'mk_bulan' => $model->mk_bulan,
            'jenis_jabatan_id' => $model->jenis_jabatan_id,
            'jenis_jabatan_nama' => $model->jenis_jabatan_nama,
            'jabatan_id' => $model->jabatan_id,
            'jabatan_nama' => $model->jabatan_nama,
            'tmt_jabatan' => $model->tmt_jabatan,
            'tingkat_pendidikan_id' => $model->tingkat_pendidikan_id,
            'tingkat_pendidikan_nama' => $model->tingkat_pendidikan_nama,
            'pendidikan_id' => $model->pendidikan_id,
            'pendidikan_nama' => $model->pendidikan_nama,
            'tahun_lulus' => $model->tahun_lulus,
            'kpkn_id' => $model->kpkn_id,
            'kpkn_nama' => $model->kpkn_nama,
            'lokasi_kerja_id' => $model->lokasi_kerja_id,
            'lokasi_kerja_nama' => $model->lokasi_kerja_nama,
            'unor_id' => $model->unor_id,
            'unor_nama' => $model->unor_nama,
            'instansi_induk_id' => $model->instansi_induk_id,
            'instansi_induk_nama' => $model->instansi_induk_nama,
            'instansi_kerja_id' => $model->instansi_kerja_id,
            'instansi_kerja_nama' => $model->instansi_kerja_nama,
            'satuan_kerja_induk_id' => $model->satuan_kerja_induk_id,
            'satuan_kerja_induk_nama' => $model->satuan_kerja_induk_nama,
            'satuan_kerja_kerja_id' => $model->satuan_kerja_kerja_id,
            'satuan_kerja_kerja_nama' => $model->satuan_kerja_kerja_nama,

            // 'created_at' => $model->created_at,
            // 'updated_at' => $model->updated_at,
            // 'deleted_at' => $model->deleted_at,
        ];
    }
}
