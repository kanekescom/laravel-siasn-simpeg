<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwCltnResource;

class CltnsRelationManager extends RelationManager
{
    protected static string $relationship = 'cltns';

    protected static ?string $title = 'CLTN';

    public function form(Form $form): Form
    {
        return PnsRwCltnResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwCltnResource::table($table);
    }
}
