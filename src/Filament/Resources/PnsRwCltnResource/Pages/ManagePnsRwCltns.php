<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwCltnResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwCltnResource;

class ManagePnsRwCltns extends ManageRecords
{
    protected static string $resource = PnsRwCltnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
