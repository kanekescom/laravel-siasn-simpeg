<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwKursusTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['tanggalKursus_'] = convert_date_format($item['tanggalKursus'], 'd-m-Y', 'Y-m-d');
        $item['jenisDiklatId'] = is_numeric($item['jenisDiklatId']) ? $item['jenisDiklatId'] : null;
        $item['tanggalSelesaiKursus_'] = convert_date_format($item['tanggalSelesaiKursus'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
