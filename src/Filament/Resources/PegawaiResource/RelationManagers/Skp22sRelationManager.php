<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwSkp22Resource;
use Kanekescom\Siasn\Simpeg\Services\PullRiwayatService;

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
                        try {
                            PullRiwayatService::find($livewire->getOwnerRecord()->nip_baru)
                                ->skp22()
                                ->skp();

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
