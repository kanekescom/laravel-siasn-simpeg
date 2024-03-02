<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwCltnResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class CltnsRelationManager extends RelationManager
{
    protected static string $relationship = 'cltns';

    protected static ?string $title = 'CLTN';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwCltnResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwCltnResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->cltn()
                            ->withNotification();
                    }),
            ]);
    }
}
