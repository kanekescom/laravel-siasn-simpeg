<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\MasakerjasRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwMasakerjaResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwMasakerja;

class PnsRwMasakerjaResource extends Resource
{
    protected static ?string $model = PnsRwMasakerja::class;

    protected static ?string $slug = 'pns-rw-masakerja';

    protected static ?string $pluralLabel = 'PNS RW Masa Kerja';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Masa Kerja';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('idPns')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nipBaru')
                    ->maxLength(18)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nipLama')
                    ->maxLength(9)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('pengalaman')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nomorSk')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tanggalSk')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nomorBkn')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tanggalBkn')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tasaKerjaTahun')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('masaKerjaBulan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tanggalAwal')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tanggalSelesai')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('dinilai')
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
                        Artisan::call('siasn-simpeg:pull-riwayat pns-rw-masakerja --track --startOver');
                    }),
            ])
            ->defaultPaginationPageOption(5)
            // ->defaultSort('', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(MasakerjasRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(MasakerjasRelationManager::class)
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
                Tables\Columns\TextColumn::make('idPns')
                    ->hiddenOn(MasakerjasRelationManager::class)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipBaru')
                    ->hiddenOn(MasakerjasRelationManager::class)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipLama')
                    ->hiddenOn(MasakerjasRelationManager::class)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pengalaman')
                    ->toggleable(isToggledHiddenByDefault: true)
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
                Tables\Columns\TextColumn::make('nomorBkn')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tanggalBkn')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tasaKerjaTahun')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaKerjaBulan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tanggalAwal')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tanggalSelesai')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('dinilai')
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
            'index' => Pages\ManagePnsRwMasakerjas::route('/'),
        ];
    }
}
