<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\Dp3sRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwDp3Resource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwDp3;

class PnsRwDp3Resource extends Resource
{
    protected static ?string $model = PnsRwDp3::class;

    protected static ?string $slug = 'pns-rw-dp3';

    protected static ?string $pluralLabel = 'PNS RW DP3';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'DP3';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('pnsId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanNonPns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPejabatPenilaiId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('atasanPenilaiGolongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiNipNrp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiTmtGolongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiUnorNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kejujuran')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kepemimpinan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kerjasama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kesetiaan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ketaatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nilairatarata')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pejabatPenilaiId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('penilaiGolongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiNipNrp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiNonPns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiTmtGolongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiUnorNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('prakarsa')
                    ->maxLength(255),
                Forms\Components\TextInput::make('prestasiKerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('statusAtasanPenilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('statusPenilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggungJawab')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(Dp3sRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(Dp3sRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('pnsId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahun')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanNonPns')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPejabatPenilaiId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiGolongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiNipNrp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiTmtGolongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiUnorNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlah')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kejujuran')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kepemimpinan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kerjasama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kesetiaan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('ketaatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilairatarata')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pejabatPenilaiId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiGolongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNipNrp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNonPns')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiTmtGolongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiUnorNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('prakarsa')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('prestasiKerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusAtasanPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusPenilai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tanggungJawab')
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
            'index' => Pages\ManagePnsRwDp3s::route('/'),
        ];
    }
}
