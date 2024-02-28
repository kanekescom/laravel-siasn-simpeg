<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\Skp22sRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwSkp22Resource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwSkp22;

class PnsRwSkp22Resource extends Resource
{
    protected static ?string $model = PnsRwSkp22::class;

    protected static ?string $slug = 'pns-rw-skp22';

    protected static ?string $pluralLabel = 'PNS RW SKP 2022';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'SKP 2022';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('hasilKinerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('hasilKinerjaNilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kuadranKinerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('KuadranKinerjaNilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaPenilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nipNrpPenilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiGolonganId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('penilaiJabatanNm')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiUnorNm')
                    ->maxLength(255),
                Forms\Components\TextInput::make('perilakuKerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('PerilakuKerjaNilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pnsDinilaiId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('statusPenilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(Skp22sRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(Skp22sRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('hasilKinerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('hasilKinerjaNilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kuadranKinerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('KuadranKinerjaNilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipNrpPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiGolonganId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiJabatanNm')
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
                Tables\Columns\TextColumn::make('PerilakuKerjaNilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pnsDinilaiId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahun')
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
            'index' => Pages\ManagePnsRwSkp22s::route('/'),
        ];
    }
}
