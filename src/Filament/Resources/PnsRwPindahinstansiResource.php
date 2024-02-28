<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\PindahinstansisRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPindahinstansiResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwPindahinstansi;

class PnsRwPindahinstansiResource extends Resource
{
    protected static ?string $model = PnsRwPindahinstansi::class;

    protected static ?string $slug = 'pns-rw-pindahinstansi';

    protected static ?string $pluralLabel = 'PNS RW Pindah Instansi';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pindah Instansi';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('eselon')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansiIndukBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansiIndukLama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansiKerjaBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansiKerjaLama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatanFungsionalBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatanFungsionalLama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatanFungsionalUmumBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisJabatanBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisJabatanLama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisPegawai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisPi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kpknBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lokasiKerjaBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lokasiKerjaLama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('orangUsulPeremajaanId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('pnsOrang')
                    ->maxLength(255),
                Forms\Components\TextInput::make('satuanKerjaBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('satuanKerjaIndukBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('satuanKerjaIndukLama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('satuanKerjaLama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skAsalNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skAsalProvNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skAsalProvTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skAsalTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skBknNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skBknTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skTujuanNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skTujuanTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skUsulNomor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skUsulTanggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtPi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('unorBaru')
                    ->maxLength(255),
                Forms\Components\TextInput::make('unorLama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(PindahinstansisRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(PindahinstansisRelationManager::class)
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('eselon')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiIndukBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiIndukLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalUmumBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatanBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatanLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisPegawai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisPi')
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
                Tables\Columns\TextColumn::make('lokasiKerjaLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('orangUsulPeremajaanId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pnsOrang')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaIndukBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaIndukLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skAsalNomor')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skAsalProvNomor')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skAsalProvTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skAsalTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skBknNomor')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skBknTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skTujuanNomor')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skTujuanTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skUsulNomor')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skUsulTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtPi')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorLama')
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
            'index' => Pages\ManagePnsRwPindahinstansis::route('/'),
        ];
    }
}
