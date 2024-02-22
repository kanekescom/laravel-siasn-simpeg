<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPendidikanResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPendidikanResource;

class ManagePnsRwPendidikans extends ManageRecords
{
    protected static string $resource = PnsRwPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
