<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwKursusResource;

class KursusesRelationManager extends RelationManager
{
    protected static string $relationship = 'kursuses';

    protected static ?string $title = 'Kursus';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwKursusResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwKursusResource::table($table);
    }
}
