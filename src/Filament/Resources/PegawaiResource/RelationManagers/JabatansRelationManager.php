<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwJabatanResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class JabatansRelationManager extends RelationManager
{
    protected static string $relationship = 'jabatans';

    protected static ?string $title = 'Jabatan';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwJabatanResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwJabatanResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::make()
                            ->jabatan($livewire->getOwnerRecord()->nip_baru)
                            ->withNotification();
                    }),
            ])->defaultPaginationPageOption(5);
    }
}
