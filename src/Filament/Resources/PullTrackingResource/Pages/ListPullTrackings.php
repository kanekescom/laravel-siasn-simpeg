<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingResource;

class ListPullTrackings extends ListRecords
{
    protected static string $resource = PullTrackingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
