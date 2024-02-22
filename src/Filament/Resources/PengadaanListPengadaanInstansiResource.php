<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PengadaanListPengadaanInstansiResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PengadaanListPengadaanInstansi;

class PengadaanListPengadaanInstansiResource extends Resource
{
    protected static ?string $model = PengadaanListPengadaanInstansi::class;

    protected static ?string $slug = 'pengadaan-list-pengadaan-instansi';

    protected static ?string $pluralLabel = 'Pengadaan List Pengadaan Instansi';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pengadaan List Pengadaan Instansi';

    protected static ?string $navigationGroup = 'SIASN SIMPEG';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('orang_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_peserta')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('periode')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansi_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_pertek')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_sk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path_ttd_sk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path_ttd_pertek')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tgl_pertek')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tgl_sk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tgl_kontrak_mulai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tgl_kontrak_akhir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_formasi_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_formasi_nama')
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
                Tables\Columns\TextColumn::make('orang_id')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('no_peserta')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nip')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('periode')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansi_id')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('no_pertek')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('no_sk')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('path_ttd_sk')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('path_ttd_pertek')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tgl_pertek')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tgl_sk')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tgl_kontrak_mulai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tgl_kontrak_akhir')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenis_formasi_id')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenis_formasi_nama')
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
            'index' => Pages\ManagePengadaanListPengadaanInstansis::route('/'),
        ];
    }
}
