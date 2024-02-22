<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\DataPernikahanResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\DataPernikahanResource;

class ManageDataPernikahans extends ManageRecords
{
    protected static string $resource = DataPernikahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
