<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\PendidikansRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPendidikanResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwPendidikan;

class PnsRwPendidikanResource extends Resource
{
    protected static ?string $model = PnsRwPendidikan::class;

    protected static ?string $slug = 'pns-rw-pendidikan';

    protected static ?string $pluralLabel = 'PNS RW Pendidikan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pendidikan';

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
                Forms\Components\TextInput::make('pendidikanId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('pendidikanNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tkPendidikanId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('tkPendidikanNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahunLulus')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tglLulus')
                    ->maxLength(255),
                Forms\Components\TextInput::make('isPendidikanPertama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomorIjasah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaSekolah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gelarDepan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gelarBelakang')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(PendidikansRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(PendidikansRelationManager::class)
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
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pendidikanId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pendidikanNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tkPendidikanId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tkPendidikanNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahunLulus')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglLulus')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('isPendidikanPertama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nomorIjasah')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaSekolah')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('gelarDepan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('gelarBelakang')
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
            'index' => Pages\ManagePnsRwPendidikans::route('/'),
        ];
    }
}
