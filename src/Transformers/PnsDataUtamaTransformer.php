<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsDataUtamaTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($item)
    {
        $item['tglLahir_'] = convert_date_format($item['tglLahir'], 'd-m-Y', 'Y-m-d');
        $item['tahunLulus_'] = convert_date_format($item['tahunLulus'], 'd-m-Y', 'Y-m-d');
        $item['tmtPns_'] = convert_date_format($item['tmtPns'], 'd-m-Y', 'Y-m-d');
        $item['tmtPensiun_'] = convert_date_format($item['tmtPensiun'], 'd-m-Y', 'Y-m-d');
        $item['tglSkPns_'] = convert_date_format($item['tglSkPns'], 'd-m-Y', 'Y-m-d');
        $item['tmtCpns_'] = convert_date_format($item['tmtCpns'], 'd-m-Y', 'Y-m-d');
        $item['tglSkCpns_'] = convert_date_format($item['tglSkCpns'], 'd-m-Y', 'Y-m-d');
        $item['tmtJabatan_'] = convert_date_format($item['tmtJabatan'], 'd-m-Y', 'Y-m-d');
        $item['tmtGolAkhir_'] = convert_date_format($item['tmtGolAkhir'], 'd-m-Y', 'Y-m-d');
        $item['tmtEselon_'] = convert_date_format($item['tmtEselon'], 'd-m-Y', 'Y-m-d');
        $item['gajiPokok'] = is_numeric($item['gajiPokok']) ? $item['gajiPokok'] : null;
        $item['tglSuratKeteranganDokter_'] = convert_date_format($item['tglSuratKeteranganDokter'], 'd-m-Y', 'Y-m-d');
        $item['tglSuratKeteranganBebasNarkoba_'] = convert_date_format($item['tglSuratKeteranganBebasNarkoba'], 'd-m-Y', 'Y-m-d');
        $item['tglSkck_'] = convert_date_format($item['tglSkck'], 'd-m-Y', 'Y-m-d');
        $item['tglMeninggal_'] = convert_date_format($item['tglMeninggal'], 'd-m-Y', 'Y-m-d');
        $item['tglNpwp_'] = convert_date_format($item['tglNpwp'], 'd-m-Y', 'Y-m-d');
        $item['tglSttpl_'] = convert_date_format($item['tglSttpl'], 'd-m-Y', 'Y-m-d');
        $item['tanggal_taspen_'] = parse_date_format($item['tanggal_taspen'], 'Y-m-d H:i:s');
        $item['validNik'] = (bool) $item['validNik'];

        return $item;
    }
}
