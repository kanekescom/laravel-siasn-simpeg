<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\GolongansRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwGolonganResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwGolongan;

class PnsRwGolonganResource extends Resource
{
    protected static ?string $model = PnsRwGolongan::class;

    protected static ?string $slug = 'pns-rw-golongan';

    protected static ?string $pluralLabel = 'PNS RW Golongan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Golongan';

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
                Forms\Components\TextInput::make('golonganId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('golongan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skNomor')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skTanggal')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tmtGolongan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('noPertekBkn')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tglPertekBkn')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jumlahKreditUtama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jumlahKreditTambahan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jenisKPId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jenisKPNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('masaKerjaGolonganTahun')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('masaKerjaGolonganBulan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('path')
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('pangkat')
                    ->maxLength(255)
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
                        Artisan::call('siasn-simpeg:pull-riwayat pns-rw-golongan --track --startOver');
                    }),
            ])
            ->columns([
                // Tables\Columns\TextColumn::make('pegawai.nip_baru')
                //     ->hiddenOn(GolongansRelationManager::class)
                //     ->copyable()
                //     ->sortable()
                //     ->searchable(isIndividual: true)
                //     ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(GolongansRelationManager::class)
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
                Tables\Columns\TextColumn::make('idPns')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipLama')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golonganId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golongan')
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
                Tables\Columns\TextColumn::make('tmtGolongan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('noPertekBkn')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglPertekBkn')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlahKreditUtama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlahKreditTambahan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisKPId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisKPNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaKerjaGolonganTahun')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaKerjaGolonganBulan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pangkat')
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
            'index' => Pages\ManagePnsRwGolongans::route('/'),
        ];
    }
}
