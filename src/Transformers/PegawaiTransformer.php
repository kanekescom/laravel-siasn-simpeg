<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PegawaiTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['tanggal_lahir_'] = convert_date_format($item['tanggal_lahir'], 'd-m-Y', 'Y-m-d');
        $item['tanggal_sk_cpns_'] = convert_date_format($item['tanggal_sk_cpns'], 'd-m-Y', 'Y-m-d');
        $item['tmt_cpns_'] = convert_date_format($item['tmt_cpns'], 'd-m-Y', 'Y-m-d');
        $item['nomor_sk_pns_'] = convert_date_format($item['nomor_sk_pns'], 'd-m-Y', 'Y-m-d');
        $item['tanggal_sk_pns_'] = convert_date_format($item['tanggal_sk_pns'], 'd-m-Y', 'Y-m-d');
        $item['tmt_pns_'] = convert_date_format($item['tmt_pns'], 'd-m-Y', 'Y-m-d');
        $item['tmt_golongan_'] = convert_date_format($item['tmt_golongan'], 'd-m-Y', 'Y-m-d');
        $item['tmt_jabatan_'] = convert_date_format($item['tmt_jabatan'], 'd-m-Y', 'Y-m-d');
        $item['is_valid_nik'] = (bool) $item['is_valid_nik'];

        return $item;
    }
}
