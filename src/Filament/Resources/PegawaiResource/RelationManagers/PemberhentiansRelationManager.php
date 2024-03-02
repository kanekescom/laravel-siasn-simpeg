<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPemberhentianResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class PemberhentiansRelationManager extends RelationManager
{
    protected static string $relationship = 'pemberhentians';

    protected static ?string $title = 'Pemberhentian';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwPemberhentianResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwPemberhentianResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->pemberhentian()
                            ->withNotification();
                    }),
            ]);
    }
}
