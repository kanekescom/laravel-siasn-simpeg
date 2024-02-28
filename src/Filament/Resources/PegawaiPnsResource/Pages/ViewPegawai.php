<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiPnsResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiPnsResource;

class ViewPegawai extends ViewRecord
{
    protected static string $resource = PegawaiPnsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
