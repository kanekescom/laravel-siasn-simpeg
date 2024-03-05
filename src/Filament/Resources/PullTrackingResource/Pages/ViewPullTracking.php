<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingResource;

class ViewPullTracking extends ViewRecord
{
    protected static string $resource = PullTrackingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
