<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPemberhentianResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPemberhentianResource;

class ManagePnsRwPemberhentians extends ManageRecords
{
    protected static string $resource = PnsRwPemberhentianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
