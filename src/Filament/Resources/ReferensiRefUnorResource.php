<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\ReferensiRefUnorResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\ReferensiRefUnor;

class ReferensiRefUnorResource extends Resource
{
    protected static ?string $model = ReferensiRefUnor::class;

    protected static ?string $slug = 'referensi-ref-unor';

    protected static ?string $pluralLabel = 'Referensi Unor';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Referensi Unor';

    protected static ?string $navigationGroup = 'SIASN SIMPEG';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('InstansiId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('DiatasanId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('EselonId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('NamaUnor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('NamaJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('CepatKode')
                    ->maxLength(255),
                Forms\Components\TextInput::make('IndukUnorId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('PemimpinPnsId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('JenisUnorId')
                    ->maxLength(42),
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
                Tables\Columns\TextColumn::make('InstansiId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('DiatasanId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('EselonId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('NamaUnor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('NamaJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('CepatKode')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('IndukUnorId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('PemimpinPnsId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('JenisUnorId')
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
            'index' => Pages\ManageReferensiRefUnors::route('/'),
        ];
    }
}
