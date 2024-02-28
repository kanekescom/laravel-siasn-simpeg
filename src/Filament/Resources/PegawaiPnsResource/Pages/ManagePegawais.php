<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiPnsResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiPnsResource;
use Kanekescom\Siasn\Simpeg\Filament\Traits\HasSubheadingWithLatestSync;

class ManagePegawais extends ManageRecords
{
    use HasSubheadingWithLatestSync;

    protected static string $resource = PegawaiPnsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
