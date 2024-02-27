<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsListPensiunInstansiResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsListPensiunInstansi;

class PnsListPensiunInstansiResource extends Resource
{
    protected static ?string $model = PnsListPensiunInstansi::class;

    protected static ?string $slug = 'pns-list-pensiun-instansi';

    protected static ?string $pluralLabel = 'PNS List Pensiun Instansi';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'PNS List Pensiun Instansi';

    protected static ?string $navigationGroup = 'Pemberhentian';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('statusUsulan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('statusUsulanNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pnsId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('nipBaru')
                    ->maxLength(18),
                Forms\Components\TextInput::make('pertekNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pathSk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pathPertek')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pertekTgl')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skTgl')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansiId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('instansiNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('detailLayananNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tglLahir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('golonganId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('golonganKppId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('tmtPensiun')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pathSkPreview')
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
                Tables\Columns\TextColumn::make('nama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusUsulan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusUsulanNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pnsId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pertekNomor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skNomor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pathSk')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pathPertek')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pertekTgl')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skTgl')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('detailLayananNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglLahir')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golonganId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golonganKppId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtPensiun')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pathSkPreview')
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
            'index' => Pages\ManagePnsListPensiunInstansis::route('/'),
        ];
    }
}
