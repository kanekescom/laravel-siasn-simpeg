<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPwkResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPwkResource;

class ManagePnsRwPwks extends ManageRecords
{
    protected static string $resource = PnsRwPwkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
