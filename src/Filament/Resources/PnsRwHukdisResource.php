<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\HukdisesRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwHukdisResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwHukdis;

class PnsRwHukdisResource extends Resource
{
    protected static ?string $model = PnsRwHukdis::class;

    protected static ?string $slug = 'pns-rw-hukdis';

    protected static ?string $pluralLabel = 'PNS RW Hukdis';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Hukdis';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('rwHukumanDisiplin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('golongan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kedudukanHukum')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisHukuman')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pnsOrang')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('hukumanTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('masaTahun')
                    ->maxLength(255),
                Forms\Components\TextInput::make('masaBulan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('akhirHukumTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomorPp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('golonganLama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skPembatalanNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skPembatalanTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alasanHukumanDisiplin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alasanHukumanDisiplinNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisHukumanNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path'),
                Forms\Components\TextInput::make('keterangan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisTingkatHukumanId')
                    ->maxLength(42),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(HukdisesRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(HukdisesRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('rwHukumanDisiplin')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kedudukanHukum')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisHukuman')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pnsOrang')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skNomor')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('hukumanTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaTahun')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaBulan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('akhirHukumTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nomorPp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golonganLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skPembatalanNomor')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skPembatalanTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('alasanHukumanDisiplin')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('alasanHukumanDisiplinNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisHukumanNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('keterangan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisTingkatHukumanId')
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
            'index' => Pages\ManagePnsRwHukdis::route('/'),
        ];
    }
}
