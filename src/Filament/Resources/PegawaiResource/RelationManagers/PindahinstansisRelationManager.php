<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPindahinstansiResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class PindahinstansisRelationManager extends RelationManager
{
    protected static string $relationship = 'pindahinstansis';

    protected static ?string $title = 'Pindah Instansi';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwPindahinstansiResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwPindahinstansiResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->pindahinstansi()
                            ->withNotification();
                    }),
            ]);
    }
}
