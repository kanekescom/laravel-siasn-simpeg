<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\Pages;

use Filament\Resources\Pages\ViewRecord;

class ViewPegawai extends ViewRecord
{
    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }
}
