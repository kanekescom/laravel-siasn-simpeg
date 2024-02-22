<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PnsPhotoResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsPhotoResource;

class ManagePnsPhotos extends ManageRecords
{
    protected static string $resource = PnsPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
