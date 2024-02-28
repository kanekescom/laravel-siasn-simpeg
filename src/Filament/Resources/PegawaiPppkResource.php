<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiPppkResource\Pages;
use Kanekescom\Siasn\Simpeg\Filament\Traits\HasPegawaiResource;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;

class PegawaiPppkResource extends Resource
{
    use HasPegawaiResource;

    protected static ?string $model = Pegawai::class;

    protected static ?string $slug = 'pegawai-pppk';

    protected static ?string $pluralLabel = 'PPPK';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'PPPK';

    protected static ?string $navigationGroup = 'Pegawai';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return self::defaultForm($form);
    }

    public static function table(Table $table): Table
    {
        return self::defaultTable($table)
            ->modifyQueryUsing(fn ($query) => $query->pppk());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePegawais::route('/'),
            'view' => Pages\ViewPegawai::route('/{record}'),
        ];
    }
}
