<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwGolonganResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwGolonganResource;

class ManagePnsRwGolongans extends ManageRecords
{
    protected static string $resource = PnsRwGolonganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
