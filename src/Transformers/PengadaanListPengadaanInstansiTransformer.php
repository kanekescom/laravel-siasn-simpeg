<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PengadaanListPengadaanInstansiTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['tgl_pertek_'] = parse_date_format($item['tgl_pertek'], 'Y-m-d H:i:s');
        $item['tgl_sk_'] = parse_date_format($item['tgl_sk'], 'Y-m-d H:i:s');
        $item['tgl_kontrak_mulai_'] = parse_date_format($item['tgl_kontrak_mulai'], 'Y-m-d');
        $item['tgl_kontrak_akhir_'] = parse_date_format($item['tgl_kontrak_akhir'], 'Y-m-d');

        return $item;
    }
}
