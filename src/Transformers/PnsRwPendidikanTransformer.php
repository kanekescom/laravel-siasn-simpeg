<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwPendidikanTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['tglLulus_'] = convert_date_format($item['tglLulus'], 'd-m-Y', 'Y-m-d');
        $item['isPendidikanPertama'] = (bool) $item['isPendidikanPertama'];

        return $item;
    }
}
