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
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers\HukdisesRelationManager;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwHukdisResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwHukdis;
use Kanekescom\Siasn\Simpeg\Services\PostHukdisSaveService;

class PnsRwHukdisResource extends Resource
{
    protected static ?string $model = PnsRwHukdis::class;

    protected static ?string $slug = 'pns-rw-hukdis';

    protected static ?string $pluralLabel = 'PNS RW Hukdis';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Hukdis';

    protected static ?string $navigationGroup = 'Riwayat';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('pnsOrang')
                    ->maxLength(42)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('rwHukumanDisiplin')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('kedudukanHukum')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jenisHukuman')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jenisHukumanNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('jenisTingkatHukumanId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('alasanHukumanDisiplin')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('alasanHukumanDisiplinNama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('nomorPp')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skNomor')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skTanggal')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('hukumanTanggal')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('masaTahun')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('masaBulan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('akhirHukumTanggal')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skPembatalanNomor')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('skPembatalanTanggal')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('golonganLama')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('golongan')
                    ->maxLength(255)
                    ->visibleOn('view'),
                Forms\Components\TextInput::make('keterangan')
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
                        Artisan::call('siasn-simpeg:pull-riwayat pns-rw-hukdis --track --startOver');
                    }),
            ])
            ->defaultPaginationPageOption(5)
            // ->defaultSort('', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->hiddenOn(HukdisesRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->hiddenOn(HukdisesRelationManager::class)
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
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->hiddenOn(HukdisesRelationManager::class)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('rwHukumanDisiplin')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kedudukanHukum')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisHukuman')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisHukumanNama')
                    ->grow()
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisTingkatHukumanId')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('alasanHukumanDisiplin')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('alasanHukumanDisiplinNama')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nomorPp')
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
                Tables\Columns\TextColumn::make('hukumanTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaTahun')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaBulan')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('akhirHukumTanggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skPembatalanNomor')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skPembatalanTanggal')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golongan')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golonganLama')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('keterangan')
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
                                (new PostHukdisSaveService($data, $record))
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
            'index' => Pages\ManagePnsRwHukdis::route('/'),
        ];
    }
}
