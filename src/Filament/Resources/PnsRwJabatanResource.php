<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Kanekescom\Siasn\Referensi\Models\Eselon;
use Kanekescom\Siasn\Referensi\Models\JabatanFungsional;
use Kanekescom\Siasn\Referensi\Models\JabatanFungsionalUmum;
use Kanekescom\Siasn\Referensi\Models\JenisJabatan;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\JabatansRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwJabatanResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwJabatan;
use Kanekescom\Siasn\Simpeg\Models\ReferensiRefUnor;
use Kanekescom\Siasn\Simpeg\Services\PostJabatanSaveService;

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
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('idPns')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nipBaru')
                    ->maxLength(18)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nipLama')
                    ->visibleOn('view')
                    ->maxLength(9),
                Forms\Components\TextInput::make('jenisJabatan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('instansiKerjaId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('instansiKerjaNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('satuanKerjaId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('satuanKerjaNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('unorId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('unorNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('namaUnor')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('unorIndukId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('unorIndukNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('eselon')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('eselonId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('namaJabatan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jabatanFungsionalId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jabatanFungsionalNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jabatanFungsionalUmumId')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jabatanFungsionalUmumNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jenjang')
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tmtJabatan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nomorSk')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tanggalSk')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('tmtPelantikan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('path')
                    ->visibleOn('view'),

                Forms\Components\Select::make('jenisJabatan')
                    ->live()
                    ->relationship('relJenisJabatan', 'nama')
                    ->exists(table: JenisJabatan::class, column: 'id')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\Select::make('eselonId')
                    ->visible(fn ($get) => in_array($get('jenisJabatan'), [1]))
                    ->relationship('eselon', 'nama')
                    ->exists(table: Eselon::class, column: 'id')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\Select::make('jabatanFungsionalId')
                    ->columnSpanFull()
                    ->visible(fn ($get) => in_array($get('jenisJabatan'), [2]))
                    ->relationship('jabatanFungsional', 'nama')
                    ->exists(table: JabatanFungsional::class, column: 'id')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hiddenOn('view'),
                Forms\Components\Select::make('jabatanFungsionalUmumId')
                    ->columnSpanFull()
                    ->visible(fn ($get) => in_array($get('jenisJabatan'), [3]))
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
                    ->required()
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
            ->defaultPaginationPageOption(5)
            // ->defaultSort('', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(JabatansRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(JabatansRelationManager::class)
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
                    ->hiddenOn(JabatansRelationManager::class)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipBaru')
                    ->hiddenOn(JabatansRelationManager::class)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipLama')
                    ->hiddenOn(JabatansRelationManager::class)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaJabatan')
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
                Tables\Columns\TextColumn::make('namaUnor')
                    ->toggleable(isToggledHiddenByDefault: true)
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
                    ->toggleable(isToggledHiddenByDefault: true)
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
                    ->toggleable(isToggledHiddenByDefault: true)
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
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenjang')
                    ->toggleable(isToggledHiddenByDefault: true)
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
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tanggalSk')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtPelantikan')
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
                    Tables\Actions\EditAction::make()
                        ->action(function ($data, $record, $livewire) {
                            try {
                                (new PostJabatanSaveService($data, $record))
                                    ->send()
                                    ->pull($livewire->getOwnerRecord()->nip_baru);

                                Notification::make()
                                    ->title('Saved successfully')
                                    ->success()
                                    ->send();
                            } catch (\Throwable $e) {
                                Notification::make()
                                    ->title('Something went wrong')
                                    ->danger()
                                    ->body($e->getMessage())
                                    ->send();

                                Log::error($e->getMessage());
                            }
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
