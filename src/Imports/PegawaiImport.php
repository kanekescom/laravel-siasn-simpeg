<?php

namespace Kanekescom\Siasn\Simpeg\Imports;

use Illuminate\Support\Arr;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;
use Kanekescom\Siasn\Simpeg\Transformers\PegawaiTransformer;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class PegawaiImport implements ToModel, WithChunkReading, WithHeadingRow, WithProgressBar
{
    use Importable;

    public function model(array $row)
    {
        $row = Arr::map($row, function ($value) {
            $cleanedString = preg_replace('/[^\p{L}\p{N}\p{P}\p{S}\s]/u', '', $value);
            $cleanedString = str_replace("'", '', $cleanedString);

            return $cleanedString === 'null' ? null : $cleanedString;
        });

        $row = fractal()
            ->item(Arr::add($row, 'deleted_at', null))
            ->transformWith(PegawaiTransformer::class)
            ->toArray()['data'];

        return Pegawai::withTrashed()
            ->updateOrCreate([
                'pns_id' => $row['pns_id'],
            ], $row);
    }

    public function chunkSize(): int
    {
        return config('siasn-simpeg.chunk_data');
    }
}
