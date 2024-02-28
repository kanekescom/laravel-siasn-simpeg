<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwSkp22Resource;

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
                        Artisan::call("siasn-simpeg:pull-riwayat pns-rw-skp22 --nipBaru={$livewire->getOwnerRecord()->nip_baru}");
                    }),
            ]);
    }
}
