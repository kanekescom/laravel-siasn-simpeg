<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwDp3Resource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwDp3;

class PnsRwDp3Resource extends Resource
{
    protected static ?string $model = PnsRwDp3::class;

    protected static ?string $slug = 'pns-rw-dp3';

    protected static ?string $pluralLabel = 'PNS RW DP3';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'PNS RW DP3';

    protected static ?string $navigationGroup = 'SIASN SIMPEG';

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
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pnsId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahun')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanNonPns')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPejabatPenilaiId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiGolongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiNipNrp')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiTmtGolongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiUnorNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlah')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kejujuran')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kepemimpinan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kerjasama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kesetiaan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('ketaatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilairatarata')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pejabatPenilaiId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiGolongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNipNrp')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNonPns')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiTmtGolongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiUnorNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('prakarsa')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('prestasiKerja')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusAtasanPenilai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusPenilai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tanggungJawab')
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