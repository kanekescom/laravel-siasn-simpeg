<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPendidikanResource;

class PendidikansRelationManager extends RelationManager
{
    protected static string $relationship = 'pendidikans';

    protected static ?string $title = 'Pendidikan';

    public function form(Form $form): Form
    {
        return PnsRwPendidikanResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwPendidikanResource::table($table);
    }
}