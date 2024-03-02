<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwKursusResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class KursusesRelationManager extends RelationManager
{
    protected static string $relationship = 'kursuses';

    protected static ?string $title = 'Kursus';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwKursusResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwKursusResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                            ->kursus()
                            ->withNotification();
                    }),
            ]);
    }
}
