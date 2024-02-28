<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwAngkakreditResource;

class AngkakreditsRelationManager extends RelationManager
{
    protected static string $relationship = 'angkakredits';

    public function form(Form $form): Form
    {
        return PnsRwAngkakreditResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwAngkakreditResource::table($table);
    }
}
