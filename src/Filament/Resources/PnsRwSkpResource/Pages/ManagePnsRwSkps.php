<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwSkpResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwSkpResource;

class ManagePnsRwSkps extends ManageRecords
{
    protected static string $resource = PnsRwSkpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
