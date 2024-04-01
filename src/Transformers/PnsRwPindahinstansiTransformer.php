<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwPindahinstansiTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['jenisJabatanLama'] = is_numeric($item['jenisJabatanLama']) ? $item['jenisJabatanLama'] : null;
        $item['jenisJabatanBaru'] = is_numeric($item['jenisJabatanBaru']) ? $item['jenisJabatanBaru'] : null;
        $item['skUsulTanggal_'] = convert_date_format($item['skUsulTanggal'], 'd-m-Y', 'Y-m-d');
        $item['skBknTanggal_'] = convert_date_format($item['skBknTanggal'], 'd-m-Y', 'Y-m-d');
        $item['tmtPi_'] = convert_date_format($item['tmtPi'], 'd-m-Y', 'Y-m-d');
        $item['skAsalTanggal_'] = convert_date_format($item['skAsalTanggal'], 'd-m-Y', 'Y-m-d');
        $item['skTujuanTanggal_'] = convert_date_format($item['skTujuanTanggal'], 'd-m-Y', 'Y-m-d');
        $item['skAsalProvTanggal_'] = convert_date_format($item['skAsalProvTanggal'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
