<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPwkResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class PwksRelationManager extends RelationManager
{
    protected static string $relationship = 'pwks';

    protected static ?string $title = 'PWK';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwPwkResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwPwkResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->pwk()
                            ->withNotification();
                    }),
            ]);
    }
}
