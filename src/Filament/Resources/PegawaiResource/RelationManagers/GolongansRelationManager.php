<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwGolonganResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class GolongansRelationManager extends RelationManager
{
    protected static string $relationship = 'golongans';

    protected static ?string $title = 'Golongan';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwGolonganResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwGolonganResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->golongan()
                            ->withNotification();
                    }),
            ]);
    }
}
