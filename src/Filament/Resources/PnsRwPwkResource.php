<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\PwksRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPwkResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwPwk;

class PnsRwPwkResource extends Resource
{
    protected static ?string $model = PnsRwPwk::class;

    protected static ?string $slug = 'pns-rw-pwk';

    protected static ?string $pluralLabel = 'PNS RW PWK';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'PWK';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('asalId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('asalNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('instansi')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kpknBaru')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('lokasiKerjaBaru')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('pnsOrang')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('satuanKerja')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skNomor')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skTanggal')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tmtPwk')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('unorBaru')
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
                        Artisan::call('siasn-simpeg:pull-riwayat pns-rw-pwk --track --startOver');
                    }),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(PwksRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(PwksRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('asalId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('asalNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansi')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kpknBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('lokasiKerjaBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pnsOrang')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerja')
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
                Tables\Columns\TextColumn::make('tmtPwk')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorBaru')
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
            'index' => Pages\ManagePnsRwPwks::route('/'),
        ];
    }
}
