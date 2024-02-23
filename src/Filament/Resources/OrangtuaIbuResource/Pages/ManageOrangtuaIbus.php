<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\OrangtuaIbuResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\OrangtuaIbuResource;

class ManageOrangtuaIbus extends ManageRecords
{
    protected static string $resource = OrangtuaIbuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
