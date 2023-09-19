<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use Kanekescom\Siasn\Simpeg\Models\ReferensiUnor;
use League\Fractal\TransformerAbstract;

class ReferensiUnorTransformer extends TransformerAbstract
{
    /**
     * Transform the ReferensiUnor model.
     *
     * @param Kanekescom\Siasn\Simpeg\Models\ReferensiUnor $model
     */
    public function transform(ReferensiUnor $model): array
    {
        return [
            'id' => $model->id,

            /* place your other model properties here */
            'instansi_id' => $model->instansi_id,
            'diatasan_id' => $model->diatasan_id,
            'eselon_id' => $model->eselon_id,
            'nama_unor' => $model->nama_unor,
            'nama_jabatan' => $model->nama_jabatan,
            'cepat_kode' => $model->cepat_kode,
            'induk_unor_id' => $model->induk_unor_id,
            'pemimpin_pns_id' => $model->pemimpin_pns_id,
            'jenis_unor_id' => $model->jenis_unor_id,

            // 'created_at' => $model->created_at,
            // 'updated_at' => $model->updated_at,
            // 'deleted_at' => $model->deleted_at,
        ];
    }
}
