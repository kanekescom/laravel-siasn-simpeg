<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwJabatanResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsRwJabatan;

class PnsRwJabatanResource extends Resource
{
    protected static ?string $model = PnsRwJabatan::class;

    protected static ?string $slug = 'pns-rw-jabatan';

    protected static ?string $pluralLabel = 'PNS RW Jabatan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'PNS RW Jabatan';

    protected static ?string $navigationGroup = 'SIASN SIMPEG';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('idPns')
                    ->maxLength(42),
                Forms\Components\TextInput::make('nipBaru')
                    ->maxLength(18),
                Forms\Components\TextInput::make('nipLama')
                    ->maxLength(9),
                Forms\Components\TextInput::make('jenisJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansiKerjaId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('instansiKerjaNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('satuanKerjaId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('satuanKerjaNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('unorId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('unorNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('unorIndukId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('unorIndukNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('eselon')
                    ->maxLength(255),
                Forms\Components\TextInput::make('eselonId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('jabatanFungsionalId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('jabatanFungsionalNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatanFungsionalUmumId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('jabatanFungsionalUmumNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomorSk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggalSk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaUnor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtPelantikan')
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
                Tables\Columns\TextColumn::make('idPns')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipBaru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipLama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorIndukId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorIndukNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('eselon')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('eselonId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalUmumId')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalUmumNama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nomorSk')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tanggalSk')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaUnor')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('namaJabatan')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtPelantikan')
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
            'index' => Pages\ManagePnsRwJabatans::route('/'),
        ];
    }
}
