<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwAngkakreditResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class AngkakreditsRelationManager extends RelationManager
{
    protected static string $relationship = 'angkakredits';

    protected static ?string $title = 'Angka Kredit';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwAngkakreditResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwAngkakreditResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        try {
                            PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                                ->angkakredit();

                            Notification::make()
                                ->title('Pulled successfully')
                                ->success()
                                ->send();
                        } catch (\Throwable $e) {
                            Notification::make()
                                ->title('Something went wrong')
                                ->danger()
                                ->body($e->getMessage())
                                ->send();

                            Log::error($e->getMessage());
                        }
                    }),
            ]);
    }
}
