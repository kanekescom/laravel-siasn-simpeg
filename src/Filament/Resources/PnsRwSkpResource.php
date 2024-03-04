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
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\SkpsRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwSkpResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwSkp;
use Kanekescom\Siasn\Simpeg\Services\PostSkp2021SaveService;
use Kanekescom\Siasn\Simpeg\Services\PostSkpSaveService;

class PnsRwSkpResource extends Resource
{
    protected static ?string $model = PnsRwSkp::class;

    protected static ?string $slug = 'pns-rw-skp';

    protected static ?string $pluralLabel = 'PNS RW SKP';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'SKP';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nilaiSkp')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('orientasiPelayanan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('integritas')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('komitmen')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('disiplin')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kerjasama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nilaiPerilakuKerja')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nilaiPrestasiKerja')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kepemimpinan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jumlah')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nilairatarata')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('atasanPejabatPenilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('pejabatPenilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('pns')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('atasanNonPns')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiNonPns')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiNipNrp')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('atasanPenilaiNipNrp')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('atasanPenilaiNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiUnorNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('atasanPenilaiUnorNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiJabatan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('atasanPenilaiJabatan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiGolongan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('atasanPenilaiGolongan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('penilaiTmtGolongan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('atasanPenilaiTmtGolongan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('statusPenilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('statusAtasanPenilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jenisJabatan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jenisPeraturanKinerjaKd')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('inisiatifKerja')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('konversiNilai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nilaiIntegrasi')
                    ->maxLength(255)
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
                        Artisan::call('siasn-simpeg:pull-riwayat pns-rw-skp --track --startOver');
                    }),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(SkpsRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(SkpsRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('tahun')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilaiSkp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('orientasiPelayanan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('integritas')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('komitmen')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('disiplin')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kerjasama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilaiPerilakuKerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilaiPrestasiKerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kepemimpinan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlah')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilairatarata')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPejabatPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pejabatPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pns')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanNonPns')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNonPns')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNipNrp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiNipNrp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiUnorNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiUnorNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiGolongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiGolongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiTmtGolongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiTmtGolongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusAtasanPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisPeraturanKinerjaKd')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('inisiatifKerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('konversiNilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilaiIntegrasi')
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
                                if ($livewire->getOwnerRecord()->tahun == 2021) {
                                    (new PostSkp2021SaveService($data, $record))
                                        ->send()
                                        ->pull($livewire->getOwnerRecord()->nip_baru);
                                } else {
                                    (new PostSkpSaveService($data, $record))
                                        ->send()
                                        ->pull($livewire->getOwnerRecord()->nip_baru);
                                }

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePnsRwSkps::route('/'),
        ];
    }
}
