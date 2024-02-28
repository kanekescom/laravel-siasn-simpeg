<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\GolongansRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwGolonganResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwGolongan;

class PnsRwGolonganResource extends Resource
{
    protected static ?string $model = PnsRwGolongan::class;

    protected static ?string $slug = 'pns-rw-golongan';

    protected static ?string $pluralLabel = 'PNS RW Golongan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Golongan';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('idPns')
                    ->maxLength(42),
                Forms\Components\TextInput::make('nipBaru')
                    ->maxLength(18),
                Forms\Components\TextInput::make('nipLama')
                    ->maxLength(9),
                Forms\Components\TextInput::make('golonganId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('golongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtGolongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('noPertekBkn')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tglPertekBkn')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlahKreditUtama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlahKreditTambahan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisKPId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('jenisKPNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('masaKerjaGolonganTahun')
                    ->maxLength(255),
                Forms\Components\TextInput::make('masaKerjaGolonganBulan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(GolongansRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(GolongansRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('idPns')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipLama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golonganId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skNomor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skTanggal')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtGolongan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('noPertekBkn')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglPertekBkn')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlahKreditUtama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlahKreditTambahan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisKPId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisKPNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaKerjaGolonganTahun')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaKerjaGolonganBulan')
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
            'index' => Pages\ManagePnsRwGolongans::route('/'),
        ];
    }
}
