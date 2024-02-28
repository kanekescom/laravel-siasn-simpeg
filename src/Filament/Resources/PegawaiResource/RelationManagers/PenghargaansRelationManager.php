<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPenghargaanResource;

class PenghargaansRelationManager extends RelationManager
{
    protected static string $relationship = 'penghargaans';

    protected static ?string $title = 'Penghargaan';

    public function form(Form $form): Form
    {
        return PnsRwPenghargaanResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwPenghargaanResource::table($table);
    }
}
