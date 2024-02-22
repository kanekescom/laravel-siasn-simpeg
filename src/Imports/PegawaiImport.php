<?php

namespace Kanekescom\Siasn\Simpeg\Imports;

use Illuminate\Support\Arr;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class PegawaiImport implements ToModel, WithHeadingRow, WithProgressBar
{
    use Importable;

    public function model(array $row)
    {
        $row = Arr::map($row, function ($value, $key) {
            $cleanedString = preg_replace('/[^\p{L}\p{N}\p{P}\p{S}\s]/u', '', $value);
            $cleanedString = str_replace("'", '', $cleanedString);

            return $cleanedString === 'null' ? null : $cleanedString;
        });

        $row = Arr::add($row, 'deleted_at', null);

        return Pegawai::withTrashed()->updateOrCreate(['pns_id' => $row[self::getField('pns_id')]], $row);
    }

    protected static function getField($var): ?string
    {
        return str($var)->slug('_');
    }
}
