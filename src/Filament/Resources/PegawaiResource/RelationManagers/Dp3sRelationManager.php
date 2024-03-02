<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwDp3Resource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class Dp3sRelationManager extends RelationManager
{
    protected static string $relationship = 'dp3s';

    protected static ?string $title = 'DP3';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwDp3Resource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwDp3Resource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->dp3()
                            ->withNotification();
                    }),
            ]);
    }
}
