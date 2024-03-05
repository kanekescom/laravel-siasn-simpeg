<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPenghargaanResource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

class PenghargaansRelationManager extends RelationManager
{
    protected static string $relationship = 'penghargaans';

    protected static ?string $title = 'Penghargaan';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwPenghargaanResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwPenghargaanResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        try {
                            PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                                ->penghargaan();

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
