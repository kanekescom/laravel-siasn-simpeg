<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwSkp22Resource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class Skp22sRelationManager extends RelationManager
{
    protected static string $relationship = 'skp22s';

    protected static ?string $title = 'Kinerja';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwSkp22Resource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwSkp22Resource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->skp22()
                            ->withNotification();
                    }),
            ]);
    }
}
