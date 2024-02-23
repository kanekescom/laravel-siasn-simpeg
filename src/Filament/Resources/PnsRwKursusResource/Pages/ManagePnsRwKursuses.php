<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwKursusResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwKursusResource;

class ManagePnsRwKursuses extends ManageRecords
{
    protected static string $resource = PnsRwKursusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
