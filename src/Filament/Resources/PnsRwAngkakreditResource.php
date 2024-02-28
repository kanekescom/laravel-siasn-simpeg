<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\AngkakreditsRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwAngkakreditResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwAngkakredit;

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
                    ->maxLength(42),
                Forms\Components\TextInput::make('pns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomorSk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggalSk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bulanMulaiPenailan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahunMulaiPenailan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bulanSelesaiPenailan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahunSelesaiPenailan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kreditUtamaBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kreditPenunjangBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kreditBaruTotal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('rwJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('isAngkaKreditPertama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('isIntegrasi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('isKonversi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path'),
                Forms\Components\TextInput::make('Sumber')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(AngkakreditsRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(AngkakreditsRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('pns')
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
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahunMulaiPenailan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('bulanSelesaiPenailan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahunSelesaiPenailan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kreditUtamaBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kreditPenunjangBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kreditBaruTotal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('rwJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('isAngkaKreditPertama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('isIntegrasi')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('isKonversi')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('Sumber')
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
            'index' => Pages\ManagePnsRwAngkakredits::route('/'),
        ];
    }
}
