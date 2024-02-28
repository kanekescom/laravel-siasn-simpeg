<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PasanganResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\Pasangan;

class PasanganResource extends Resource
{
    protected static ?string $model = Pasangan::class;

    protected static ?string $slug = '--pasangan';

    protected static ?string $pluralLabel = '--Pasangan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = '--Pasangan';

    protected static ?string $navigationGroup = 'PNS';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('ayahId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('ibuId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaKtp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gelarDepan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gelarBlk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempatLahir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tglLahir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('aktaMeninggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tglMeninggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisKelamin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisAnak')
                    ->maxLength(255),
                Forms\Components\TextInput::make('StatusHidup')
                    ->maxLength(255),
                Forms\Components\TextInput::make('JenisKawinId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('karisKarsu')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('ayahId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('ibuId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaKtp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('gelarDepan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('gelarBlk')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tempatLahir')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglLahir')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('aktaMeninggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglMeninggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisKelamin')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisAnak')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('StatusHidup')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('JenisKawinId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('karisKarsu')
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
            'index' => Pages\ManagePasangans::route('/'),
        ];
    }
}
