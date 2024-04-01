<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwPenghargaanTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['skDate_'] = convert_date_format($item['skDate'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
