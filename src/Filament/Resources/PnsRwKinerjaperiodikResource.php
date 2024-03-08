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
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\KinerjaperiodiksRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwKinerjaperiodikResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwKinerjaperiodik;
use Kanekescom\Siasn\Simpeg\Services\PostKinerjaperiodikSaveService;

class PnsRwKinerjaperiodikResource extends Resource
{
    protected static ?string $model = PnsRwKinerjaperiodik::class;

    protected static ?string $slug = 'pns-rw-kinerjaperiodik';

    protected static ?string $pluralLabel = 'PNS RW Kinerja Periodik';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kinerja Periodik';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nip')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(4)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('hasilKinerja')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('hasilKinerjaNilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('instansiId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('instansiNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jabatan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('koefisenId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kriteria')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kuadranKinerjaNilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kuadranNilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('namaPenilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiGolonganId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiJabatanNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiNipNrp')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiPnsId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiUnorNm')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('perilakuKerja')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('perilakuKerjaNilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('periodikId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('periodikNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('persentase')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('pnsDinilaiId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('statusPenilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('unorId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('unorNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('path')
                    ->visibleOn('view'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function () {
                        Artisan::call('siasn-simpeg:pull-riwayat pns-rw-kinerjaperiodik --track --startOver');
                    }),
            ])
            ->defaultPaginationPageOption(5)
            ->defaultSort('tahun', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(KinerjaperiodiksRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(KinerjaperiodiksRelationManager::class)
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
                Tables\Columns\TextColumn::make('nip')
                    ->hiddenOn(KinerjaperiodiksRelationManager::class)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahun')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nama')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('hasilKinerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('hasilKinerjaNilai')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('koefisenId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kriteria')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kuadranKinerjaNilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kuadranNilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiGolonganId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiJabatanNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNipNrp')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiPnsId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiUnorNm')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('perilakuKerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('perilakuKerjaNilai')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('periodikId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('periodikNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('persentase')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pnsDinilaiId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusPenilai')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorNama')
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->action(function ($data, $record, $livewire) {
                            try {
                                (new PostKinerjaperiodikSaveService($data, $record))
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
            'index' => Pages\ManagePnsRwKinerjaperiodiks::route('/'),
        ];
    }
}
