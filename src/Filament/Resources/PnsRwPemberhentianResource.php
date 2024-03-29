<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\PemberhentiansRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPemberhentianResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwPemberhentian;

class PnsRwPemberhentianResource extends Resource
{
    protected static ?string $model = PnsRwPemberhentian::class;

    protected static ?string $slug = 'pns-rw-pemberhentian';

    protected static ?string $pluralLabel = 'PNS RW Pemberhentian';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pemberhentian';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jenisHenti')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kedudukanHukumPns')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('pnsOrang')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skNomor')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skTanggal')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('asalId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('asalNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('asalNamaLabel')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('path')
                    ->visibleOn('view'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function () {
                        Artisan::call('siasn-simpeg:pull-riwayat pns-rw-pemberhentian --track --startOver');
                    }),
            ])
            ->defaultPaginationPageOption(5)
            // ->defaultSort('', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(PemberhentiansRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(PemberhentiansRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('pnsOrang')
                    ->hiddenOn(PemberhentiansRelationManager::class)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisHenti')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kedudukanHukumPns')
                    ->toggleable(isToggledHiddenByDefault: true)
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
                Tables\Columns\TextColumn::make('asalId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('asalNama')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('asalNamaLabel')
                    ->toggleable(isToggledHiddenByDefault: true)
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
                Tables\Filters\TrashedFilter::make(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePnsRwPemberhentians::route('/'),
        ];
    }
}
