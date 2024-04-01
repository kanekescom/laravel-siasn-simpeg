<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwDiklatTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['tanggal_'] = convert_date_format($item['tanggal'], 'd-m-Y', 'Y-m-d');
        $item['tanggalSelesai_'] = convert_date_format($item['tanggalSelesai'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
