<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwHukdisTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['golongan'] = is_numeric($item['golongan']) ? $item['golongan'] : null;
        $item['skTanggal_'] = convert_date_format($item['skTanggal'], 'd-m-Y', 'Y-m-d');
        $item['masaTahun'] = is_numeric($item['masaTahun']) ? $item['masaTahun'] : null;
        $item['masaBulan'] = is_numeric($item['masaBulan']) ? $item['masaBulan'] : null;
        $item['hukumanTanggal_'] = convert_date_format($item['hukumanTanggal'], 'd-m-Y', 'Y-m-d');
        $item['akhirHukumTanggal_'] = convert_date_format($item['akhirHukumTanggal'], 'd-m-Y', 'Y-m-d');
        $item['golonganLama'] = is_numeric($item['golonganLama']) ? $item['golonganLama'] : null;
        $item['skPembatalanTanggal_'] = convert_date_format($item['skPembatalanTanggal'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
