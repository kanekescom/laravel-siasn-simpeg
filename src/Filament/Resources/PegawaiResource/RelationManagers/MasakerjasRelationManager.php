<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwMasakerjaResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class MasakerjasRelationManager extends RelationManager
{
    protected static string $relationship = 'masakerjas';

    protected static ?string $title = 'Masa Kerja';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwMasakerjaResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwMasakerjaResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->masakerja()
                            ->withNotification();
                    }),
            ]);
    }
}
