<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwJabatanResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwJabatanResource;

class ManagePnsRwJabatans extends ManageRecords
{
    protected static string $resource = PnsRwJabatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
