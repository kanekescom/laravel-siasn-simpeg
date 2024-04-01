<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwJabatanTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['tmtJabatan_'] = convert_date_format($item['tmtJabatan'], 'd-m-Y', 'Y-m-d');
        $item['tanggalSk_'] = convert_date_format($item['tanggalSk'], 'd-m-Y', 'Y-m-d');
        $item['tmtPelantikan_'] = convert_date_format($item['tmtPelantikan'], 'd-m-Y', 'Y-m-d');
        $item['tmtMutasi_'] = convert_date_format($item['tmtMutasi'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
