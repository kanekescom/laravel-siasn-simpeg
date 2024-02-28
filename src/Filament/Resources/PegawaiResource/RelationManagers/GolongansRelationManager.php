<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwGolonganResource;

class GolongansRelationManager extends RelationManager
{
    protected static string $relationship = 'golongans';

    public function form(Form $form): Form
    {
        return PnsRwGolonganResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwGolonganResource::table($table);
    }
}
