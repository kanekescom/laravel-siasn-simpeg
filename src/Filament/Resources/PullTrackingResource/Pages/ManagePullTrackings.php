<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingResource;

class ManagePullTrackings extends ManageRecords
{
    protected static string $resource = PullTrackingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
