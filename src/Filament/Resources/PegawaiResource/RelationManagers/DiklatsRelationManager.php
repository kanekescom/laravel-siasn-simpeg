<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwDiklatResource;

class DiklatsRelationManager extends RelationManager
{
    protected static string $relationship = 'diklats';

    public function form(Form $form): Form
    {
        return PnsRwDiklatResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwDiklatResource::table($table);
    }
}
