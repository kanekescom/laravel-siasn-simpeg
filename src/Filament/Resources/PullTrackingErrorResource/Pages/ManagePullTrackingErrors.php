<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingErrorResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingErrorResource;

class ManagePullTrackingErrors extends ManageRecords
{
    protected static string $resource = PullTrackingErrorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
