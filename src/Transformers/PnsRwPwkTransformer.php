<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwPwkTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['skTanggal_'] = convert_date_format($item['skTanggal'], 'd-m-Y', 'Y-m-d');
        $item['tmtPwk_'] = convert_date_format($item['tmtPwk'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
