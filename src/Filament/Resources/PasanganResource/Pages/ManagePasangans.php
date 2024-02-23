<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PasanganResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PasanganResource;

class ManagePasangans extends ManageRecords
{
    protected static string $resource = PasanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
