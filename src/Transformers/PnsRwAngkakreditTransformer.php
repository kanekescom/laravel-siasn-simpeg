<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwAngkakreditTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['tanggalSk_'] = convert_date_format($item['tanggalSk'], 'd-m-Y', 'Y-m-d');
        $item['isAngkaKreditPertama'] = (bool) $item['isAngkaKreditPertama'];
        $item['isIntegrasi'] = (bool) $item['isIntegrasi'];
        $item['isKonversi'] = (bool) $item['isKonversi'];
        $item['created_at'] = parse_date_format($item['created_at'], 'Y-m-d H:i:s');
        $item['updated_at'] = parse_date_format($item['updated_at'], 'Y-m-d H:i:s');

        return $item;
    }
}
