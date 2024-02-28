<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwMasakerjaResource;

class MasakerjasRelationManager extends RelationManager
{
    protected static string $relationship = 'masakerjas';

    public function form(Form $form): Form
    {
        return PnsRwMasakerjaResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwMasakerjaResource::table($table);
    }
}
