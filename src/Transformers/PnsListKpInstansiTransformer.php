<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsListKpInstansiTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['tgl_pertek_'] = convert_date_format($item['tgl_pertek'], 'd-m-Y', 'Y-m-d');
        $item['tgl_sk_'] = convert_date_format($item['tgl_sk'], 'd-m-Y', 'Y-m-d');
        $item['tmtKp_'] = convert_date_format($item['tmtKp'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
