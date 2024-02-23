<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsDataAnakResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsDataAnakResource;

class ManagePnsDataAnaks extends ManageRecords
{
    protected static string $resource = PnsDataAnakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
