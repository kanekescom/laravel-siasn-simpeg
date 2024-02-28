<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwJabatanResource;

class JabatansRelationManager extends RelationManager
{
    protected static string $relationship = 'jabatans';

    protected static ?string $title = 'Jabatan';

    public function form(Form $form): Form
    {
        return PnsRwJabatanResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwJabatanResource::table($table);
    }
}
