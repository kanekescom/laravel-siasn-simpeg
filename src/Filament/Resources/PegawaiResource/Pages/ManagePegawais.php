<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource;
use Kanekescom\Siasn\Simpeg\Filament\Traits\HasSubheadingWithLatestSync;

class ManagePegawais extends ManageRecords
{
    use HasSubheadingWithLatestSync;

    protected static string $resource = PegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
