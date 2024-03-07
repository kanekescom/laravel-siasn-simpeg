<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\AngkakreditsRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwAngkakreditResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwAngkakredit;
use Kanekescom\Siasn\Simpeg\Services\PostAngkakreditSaveService;

class PnsRwAngkakreditResource extends Resource
{
    protected static ?string $model = PnsRwAngkakredit::class;

    protected static ?string $slug = 'pns-rw-angkakredit';

    protected static ?string $pluralLabel = 'PNS RW Angka Kredit';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Angka Kredit';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('pns')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('rwJabatan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('namaJabatan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kreditUtamaBaru')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kreditPenunjangBaru')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kreditBaruTotal')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('isAngkaKreditPertama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('isIntegrasi')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('isKonversi')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nomorSk')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tanggalSk')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('bulanMulaiPenailan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tahunMulaiPenailan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('bulanSelesaiPenailan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tahunSelesaiPenailan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('path')
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('Sumber')
                    ->maxLength(255)
                    ->visibleOn('view'),

                Forms\Components\TextInput::make('bulanMulaiPenailan')
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\TextInput::make('bulanSelesaiPenailan')
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\Toggle::make('isAngkaKreditPertama')
                    ->hiddenOn('view'),
                Forms\Components\Toggle::make('isIntegrasi')
                    ->hiddenOn('view'),
                Forms\Components\Toggle::make('isKonversi')
                    ->hiddenOn('view'),
                Forms\Components\TextInput::make('kreditBaruTotal')
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\TextInput::make('kreditPenunjangBaru')
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\TextInput::make('kreditUtamaBaru')
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\TextInput::make('nomorSk')
                    ->required()
                    ->hiddenOn('view'),
                // Forms\Components\TextInput::make('rwJabatanId')
                //     ->required()
                //     ->hiddenOn('view'),
                Forms\Components\TextInput::make('tahunMulaiPenailan')
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\TextInput::make('tahunSelesaiPenailan')
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\DatePicker::make('tanggalSk')
                    ->format('d-m-Y')
                    ->date()
                    ->required()
                    ->hiddenOn('view'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function () {
                        Artisan::call('siasn-simpeg:pull-riwayat pns-rw-angkakredit --track --startOver');
                    }),
            ])
            ->defaultPaginationPageOption(5)
            // ->defaultSort('', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(AngkakreditsRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(AngkakreditsRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('pns')
                    ->hiddenOn(AngkakreditsRelationManager::class)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('rwJabatan')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kreditUtamaBaru')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kreditPenunjangBaru')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kreditBaruTotal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('isAngkaKreditPertama')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('isIntegrasi')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('isKonversi')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nomorSk')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tanggalSk')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('bulanMulaiPenailan')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahunMulaiPenailan')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('bulanSelesaiPenailan')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahunSelesaiPenailan')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('Sumber')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->action(function ($data, $record, $livewire) {
                            try {
                                (new PostAngkakreditSaveService($data, $record))
                                    ->send()
                                    ->pull($livewire->getOwnerRecord()->nip_baru);

                                Notification::make()
                                    ->title('Saved successfully')
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
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePnsRwAngkakredits::route('/'),
        ];
    }
}
