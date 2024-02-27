<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPindahinstansiResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwPindahinstansi;

class PnsRwPindahinstansiResource extends Resource
{
    protected static ?string $model = PnsRwPindahinstansi::class;

    protected static ?string $slug = 'pns-rw-pindahinstansi';

    protected static ?string $pluralLabel = 'PNS RW Pindah Instansi';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'PNS RW Pindah Instansi';

    protected static ?string $navigationGroup = 'SIASN SIMPEG';

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
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('eselon')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiIndukBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiIndukLama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaLama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalLama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalUmumBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatanBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatanLama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisPegawai')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisPi')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kpknBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('lokasiKerjaBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('lokasiKerjaLama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('orangUsulPeremajaanId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pnsOrang')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaIndukBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaIndukLama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaLama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skAsalNomor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skAsalProvNomor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skAsalProvTanggal')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skAsalTanggal')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skBknNomor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skBknTanggal')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skTujuanNomor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skTujuanTanggal')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skUsulNomor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skUsulTanggal')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtPi')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorLama')
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
