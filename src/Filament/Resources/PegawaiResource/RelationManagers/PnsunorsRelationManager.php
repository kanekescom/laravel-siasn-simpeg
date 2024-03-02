<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPnsunorResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class PnsunorsRelationManager extends RelationManager
{
    protected static string $relationship = 'pnsunors';

    protected static ?string $title = 'Unor';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwPnsunorResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwPnsunorResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->pnsunor()
                            ->withNotification();
                    }),
            ]);
    }
}
