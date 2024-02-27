<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\ReferensiRefUnorResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Simpeg\Filament\Resources\ReferensiRefUnorResource;

class ManageReferensiRefUnors extends ManageRecords
{
    protected static string $resource = ReferensiRefUnorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('sync')
                ->requiresConfirmation()
                ->action(fn () => Artisan::call('siasn-simpeg:pull-referensi-ref-unor')),
        ];
    }
}
