<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwMasakerjaTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['tanggalAwal_'] = convert_date_format($item['tanggalAwal'], 'd-m-Y', 'Y-m-d');
        $item['tanggalSelesai_'] = convert_date_format($item['tanggalSelesai'], 'd-m-Y', 'Y-m-d');
        $item['tanggalSk_'] = convert_date_format($item['tanggalSk'], 'd-m-Y', 'Y-m-d');
        $item['tanggalBkn_'] = convert_date_format($item['tanggalBkn'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
