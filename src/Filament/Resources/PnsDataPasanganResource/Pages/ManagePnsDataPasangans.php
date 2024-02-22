<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsDataPasanganResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsDataPasanganResource;

class ManagePnsDataPasangans extends ManageRecords
{
    protected static string $resource = PnsDataPasanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
