<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiPnsResource\Pages;
use Kanekescom\Siasn\Simpeg\Filament\Traits\HasPegawaiResource;
use Kanekescom\Siasn\Simpeg\Models\Pegawai;

class PegawaiPnsResource extends Resource
{
    use HasPegawaiResource;

    protected static ?string $model = Pegawai::class;

    protected static ?string $slug = 'pegawai-pns';

    protected static ?string $pluralLabel = 'PNS';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'PNS';

    protected static ?string $navigationGroup = 'Pegawai';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return self::defaultForm($form);
    }

    public static function table(Table $table): Table
    {
        return self::defaultTable($table)
            ->modifyQueryUsing(fn ($query) => $query->pns());
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePegawais::route('/'),
            'view' => Pages\ViewPegawai::route('/{record}'),
        ];
    }
}
