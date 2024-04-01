<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwCltnTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['skTanggal_'] = convert_date_format($item['skTanggal'], 'd-m-Y', 'Y-m-d');
        $item['tanggalAwal_'] = convert_date_format($item['tanggalAwal'], 'd-m-Y', 'Y-m-d');
        $item['tanggalAkhir_'] = convert_date_format($item['tanggalAkhir'], 'd-m-Y', 'Y-m-d');
        $item['tanggalAktif_'] = convert_date_format($item['tanggalAktif'], 'd-m-Y', 'Y-m-d');
        $item['tanggalLetterBkn_'] = parse_date_format($item['tanggalLetterBkn'], 'Y-m-d H:i:s');

        return $item;
    }
}
