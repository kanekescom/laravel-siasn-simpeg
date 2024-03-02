<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwDiklatResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class DiklatsRelationManager extends RelationManager
{
    protected static string $relationship = 'diklats';

    protected static ?string $title = 'Diklat';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwDiklatResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwDiklatResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->diklat()
                            ->withNotification();
                    }),
            ]);
    }
}
