<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsListPensiunInstansiTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['pertekTgl_'] = convert_date_format($item['pertekTgl'], 'd-m-Y', 'Y-m-d');
        $item['skTgl_'] = convert_date_format($item['skTgl'], 'd-m-Y', 'Y-m-d');
        $item['tglLahir_'] = convert_date_format($item['tglLahir'], 'd-m-Y', 'Y-m-d');
        $item['tmtPensiun_'] = parse_date_format($item['tmtPensiun'], 'Y-m-d H:i:s');

        return $item;
    }
}
