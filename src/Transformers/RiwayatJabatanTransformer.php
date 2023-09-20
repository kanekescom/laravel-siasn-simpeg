<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use Kanekescom\Siasn\Simpeg\Models\RiwayatJabatan;
use League\Fractal\TransformerAbstract;

class RiwayatJabatanTransformer extends TransformerAbstract
{
    /**
     * Transform the RiwayatJabatan model.
     *
     * @param Kanekescom\Siasn\Simpeg\Models\RiwayatJabatan $model
     */
    public function transform(RiwayatJabatan $model): array
    {
        return [
            'id' => $model->id,

            /* place your other model properties here */
            'id_pns' => $model->id_pns,
            'nip_baru' => $model->nip_baru,
            'nip_lama' => $model->nip_lama,
            'jenis_jabatan' => $model->jenis_jabatan,
            'instansi_kerja_id' => $model->instansi_kerja_id,
            'instansi_kerja_nama' => $model->instansi_kerja_nama,
            'satuan_kerja_id' => $model->satuan_kerja_id,
            'satuan_kerja_nama' => $model->satuan_kerja_nama,
            'unor_id' => $model->unor_id,
            'unor_nama' => $model->unor_nama,
            'unor_induk_id' => $model->unor_induk_id,
            'unor_induk_nama' => $model->unor_induk_nama,
            'eselon' => $model->eselon,
            'eselon_id' => $model->eselon_id,
            'jabatan_fungsional_id' => $model->jabatan_fungsional_id,
            'jabatan_fungsional_nama' => $model->jabatan_fungsional_nama,
            'jabatan_fungsional_umum_id' => $model->jabatan_fungsional_umum_id,
            'jabatan_fungsional_umum_nama' => $model->jabatan_fungsional_umum_nama,
            'tmt_jabatan' => $model->tmt_jabatan,
            'nomor_sk' => $model->nomor_sk,
            'tanggal_sk' => $model->tanggal_sk,
            'nama_unor' => $model->nama_unor,
            'nama_jabatan' => $model->nama_jabatan,
            'tmt_pelantikan' => $model->tmt_pelantikan,
            'path' => $model->path,

            // 'created_at' => $model->created_at,
            // 'updated_at' => $model->updated_at,
            // 'deleted_at' => $model->deleted_at,
        ];
    }
}
