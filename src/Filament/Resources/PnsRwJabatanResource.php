<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Referensi\Enums\JenisJabatanEnum;
use Kanekescom\Siasn\Referensi\Models\Eselon;
use Kanekescom\Siasn\Referensi\Models\JabatanFungsional;
use Kanekescom\Siasn\Referensi\Models\JabatanFungsionalUmum;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\JabatansRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwJabatanResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwJabatan;
use Kanekescom\Siasn\Simpeg\Models\ReferensiRefUnor;
use Kanekescom\Siasn\Simpeg\Services\PostJabatanSaveService;
use Spatie\LaravelOptions\Options;

class PnsRwJabatanResource extends Resource
{
    protected static ?string $model = PnsRwJabatan::class;

    protected static ?string $slug = 'pns-rw-jabatan';

    protected static ?string $pluralLabel = 'PNS RW Jabatan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Jabatan';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->visibleOn('view')
                    ->maxLength(42),
                Forms\Components\TextInput::make('idPns')
                    ->visibleOn('view')
                    ->maxLength(42),
                Forms\Components\TextInput::make('nipBaru')
                    ->visibleOn('view')
                    ->maxLength(18),
                Forms\Components\TextInput::make('nipLama')
                    ->visibleOn('view')
                    ->maxLength(9),
                Forms\Components\TextInput::make('jenisJabatan')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansiKerjaId')
                    ->visibleOn('view')
                    ->maxLength(42),
                Forms\Components\TextInput::make('instansiKerjaNama')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('satuanKerjaId')
                    ->visibleOn('view')
                    ->maxLength(42),
                Forms\Components\TextInput::make('satuanKerjaNama')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('unorId')
                    ->visibleOn('view')
                    ->maxLength(42),
                Forms\Components\TextInput::make('unorNama')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('unorIndukId')
                    ->visibleOn('view')
                    ->maxLength(42),
                Forms\Components\TextInput::make('unorIndukNama')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('eselon')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('eselonId')
                    ->visibleOn('view')
                    ->maxLength(42),
                Forms\Components\TextInput::make('jabatanFungsionalId')
                    ->visibleOn('view')
                    ->maxLength(42),
                Forms\Components\TextInput::make('jabatanFungsionalNama')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatanFungsionalUmumId')
                    ->visibleOn('view')
                    ->maxLength(42),
                Forms\Components\TextInput::make('jabatanFungsionalUmumNama')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtJabatan')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomorSk')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggalSk')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaUnor')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaJabatan')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtPelantikan')
                    ->visibleOn('view')
                    ->maxLength(255),
                Forms\Components\TextInput::make('path')
                    ->visibleOn('view'),

                Forms\Components\Select::make('jenisJabatan')
                    ->live()
                    ->options(JenisJabatanEnum::class)
                    ->in(
                        collect(Options::forEnum(JenisJabatanEnum::class)->toArray())
                            ->pluck('value')
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\Select::make('eselonId')
                    ->visible(fn ($get) => in_array($get('jenisJabatan'), [(JenisJabatanEnum::JABATANSTRUKTURAL)->value]))
                    ->relationship('eselon', 'nama')
                    ->exists(table: Eselon::class, column: 'id')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\Select::make('jabatanFungsionalId')
                    ->columnSpanFull()
                    ->visible(fn ($get) => in_array($get('jenisJabatan'), [(JenisJabatanEnum::JABATANFUNGSIONAL)->value]))
                    ->relationship('jabatanFungsional', 'nama')
                    ->exists(table: JabatanFungsional::class, column: 'id')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\Select::make('jabatanFungsionalUmumId')
                    ->columnSpanFull()
                    ->visible(fn ($get) => in_array($get('jenisJabatan'), [(JenisJabatanEnum::JABATANPELAKSANA)->value]))
                    ->relationship('jabatanFungsionalUmum', 'nama')
                    ->exists(table: JabatanFungsionalUmum::class, column: 'id')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\Select::make('unorId')
                    ->columnSpanFull()
                    ->relationship('unor', 'NamaUnor')
                    ->exists(table: ReferensiRefUnor::class, column: 'id')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\TextInput::make('nomorSk')
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\DatePicker::make('tmtJabatan')
                    ->format('d-m-Y')
                    ->date()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\DatePicker::make('tanggalSk')
                    ->format('d-m-Y')
                    ->date()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\DatePicker::make('tmtPelantikan')
                    ->format('d-m-Y')
                    ->date()
                    ->hiddenOn('view'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function () {
                        Artisan::call('siasn-simpeg:pull-riwayat pns-rw-jabatan --track --startOver');
                    }),
            ])
            ->columns([
                // Tables\Columns\TextColumn::make('pegawai.nip_baru')
                //     ->hiddenOn(JabatansRelationManager::class)
                //     ->copyable()
                //     ->sortable()
                //     ->searchable(isIndividual: true)
                //     ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(JabatansRelationManager::class)
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
                    ->hiddenOn(JabatansRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipBaru')
                    ->hiddenOn(JabatansRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipLama')
                    ->hiddenOn(JabatansRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaNama')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaNama')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorNama')
                    ->grow()
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorIndukId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorIndukNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('eselon')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('eselonId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalUmumId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalUmumNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtJabatan')
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
                Tables\Columns\TextColumn::make('namaUnor')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtPelantikan')
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
                    Tables\Actions\EditAction::make()
                        ->action(function ($data, $record, $livewire) {
                            (new PostJabatanSaveService($data, $record, $livewire->getOwnerRecord()->nip_baru))
                                ->withNotification()
                                ->withRefresh()
                                ->send();
                        }),
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
            'index' => Pages\ManagePnsRwJabatans::route('/'),
        ];
    }
}
