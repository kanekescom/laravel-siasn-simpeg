<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwSkpTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['nilaiSkp'] = is_numeric($item['nilaiSkp']) ? $item['nilaiSkp'] : null;
        $item['orientasiPelayanan'] = is_numeric($item['orientasiPelayanan']) ? $item['orientasiPelayanan'] : null;
        $item['integritas'] = is_numeric($item['integritas']) ? $item['integritas'] : null;
        $item['komitmen'] = is_numeric($item['komitmen']) ? $item['komitmen'] : null;
        $item['disiplin'] = is_numeric($item['disiplin']) ? $item['disiplin'] : null;
        $item['kerjasama'] = is_numeric($item['kerjasama']) ? $item['kerjasama'] : null;
        $item['nilaiPerilakuKerja'] = is_numeric($item['nilaiPerilakuKerja']) ? $item['nilaiPerilakuKerja'] : null;
        $item['nilaiPrestasiKerja'] = is_numeric($item['nilaiPrestasiKerja']) ? $item['nilaiPrestasiKerja'] : null;
        $item['kepemimpinan'] = is_numeric($item['kepemimpinan']) ? $item['kepemimpinan'] : null;
        $item['jumlah'] = is_numeric($item['jumlah']) ? $item['jumlah'] : null;
        $item['nilairatarata'] = is_numeric($item['nilairatarata']) ? $item['nilairatarata'] : null;
        $item['penilaiGolongan'] = is_numeric($item['penilaiGolongan']) ? $item['penilaiGolongan'] : null;
        $item['atasanPenilaiGolongan'] = is_numeric($item['atasanPenilaiGolongan']) ? $item['atasanPenilaiGolongan'] : null;
        $item['penilaiTmtGolongan_'] = convert_date_format($item['penilaiTmtGolongan'], 'd-m-Y', 'Y-m-d');
        $item['atasanPenilaiTmtGolongan_'] = convert_date_format($item['atasanPenilaiTmtGolongan'], 'd-m-Y', 'Y-m-d');
        $item['inisiatifKerja'] = is_numeric($item['inisiatifKerja']) ? $item['inisiatifKerja'] : null;
        $item['konversiNilai'] = is_numeric($item['konversiNilai']) ? $item['konversiNilai'] : null;
        $item['nilaiIntegrasi'] = is_numeric($item['nilaiIntegrasi']) ? $item['nilaiIntegrasi'] : null;

        return $item;
    }
}
