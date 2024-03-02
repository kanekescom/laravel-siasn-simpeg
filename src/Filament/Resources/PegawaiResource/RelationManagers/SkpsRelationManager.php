<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwSkpResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class SkpsRelationManager extends RelationManager
{
    protected static string $relationship = 'skps';

    protected static ?string $title = 'SKP';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwSkpResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwSkpResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->skp()
                            ->withNotification();
                    }),
            ]);
    }
}
