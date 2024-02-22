<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\DataPernikahanResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\DataPernikahan;

class DataPernikahanResource extends Resource
{
    protected static ?string $model = DataPernikahan::class;

    protected static ?string $slug = 'data-pernikahan';

    protected static ?string $pluralLabel = 'Data Pernikahan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Data Pernikahan';

    protected static ?string $navigationGroup = 'SIASN SIMPEG';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('orangId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('pnsOrangId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('tgglMenikah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('aktaMenikah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tgglCerai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('aktaCerai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('posisi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->maxLength(255),
                Forms\Components\TextInput::make('isPns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('noSkPensiun')
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('orangId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pnsOrangId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tgglMenikah')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('aktaMenikah')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tgglCerai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('aktaCerai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('posisi')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('status')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('isPns')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('noSkPensiun')
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
            'index' => Pages\ManageDataPernikahans::route('/'),
        ];
    }
}
