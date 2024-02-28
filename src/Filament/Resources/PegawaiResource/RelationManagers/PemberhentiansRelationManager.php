<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPemberhentianResource;

class PemberhentiansRelationManager extends RelationManager
{
    protected static string $relationship = 'pemberhentians';

    protected static ?string $title = 'Pemberhentian';

    public function form(Form $form): Form
    {
        return PnsRwPemberhentianResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwPemberhentianResource::table($table);
    }
}
