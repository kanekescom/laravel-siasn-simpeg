<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwSkpResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwSkp;

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
                    ->maxLength(42),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nilaiSkp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('orientasiPelayanan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('integritas')
                    ->maxLength(255),
                Forms\Components\TextInput::make('komitmen')
                    ->maxLength(255),
                Forms\Components\TextInput::make('disiplin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kerjasama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nilaiPerilakuKerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nilaiPrestasiKerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kepemimpinan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nilairatarata')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPejabatPenilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pejabatPenilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanNonPns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiNonPns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiNipNrp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiNipNrp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiUnorNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiUnorNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiGolongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiGolongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilaiTmtGolongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atasanPenilaiTmtGolongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('statusPenilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('statusAtasanPenilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisPeraturanKinerjaKd')
                    ->maxLength(255),
                Forms\Components\TextInput::make('inisiatifKerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('konversiNilai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nilaiIntegrasi')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('tahun')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilaiSkp')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('orientasiPelayanan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('integritas')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('komitmen')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('disiplin')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kerjasama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilaiPerilakuKerja')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilaiPrestasiKerja')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kepemimpinan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlah')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilairatarata')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPejabatPenilai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pejabatPenilai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pns')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanNonPns')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNonPns')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNipNrp')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiNipNrp')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiUnorNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiUnorNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiGolongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiGolongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('penilaiTmtGolongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('atasanPenilaiTmtGolongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusPenilai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusAtasanPenilai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisPeraturanKinerjaKd')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('inisiatifKerja')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('konversiNilai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nilaiIntegrasi')
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
            'index' => Pages\ManagePnsRwSkps::route('/'),
        ];
    }
}
