<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiPppkResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiPppkResource;
use Kanekescom\Siasn\Simpeg\Filament\Traits\HasSubheadingWithLatestSync;

class ManagePegawais extends ManageRecords
{
    use HasSubheadingWithLatestSync;

    protected static string $resource = PegawaiPppkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
