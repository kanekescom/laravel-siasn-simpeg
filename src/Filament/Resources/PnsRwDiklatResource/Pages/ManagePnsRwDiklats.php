<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwDiklatResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwDiklatResource;

class ManagePnsRwDiklats extends ManageRecords
{
    protected static string $resource = PnsRwDiklatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
