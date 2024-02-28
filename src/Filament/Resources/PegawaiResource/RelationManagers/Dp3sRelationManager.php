<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwDp3Resource;

class Dp3sRelationManager extends RelationManager
{
    protected static string $relationship = 'dp3s';

    protected static ?string $title = 'DP3';

    public function form(Form $form): Form
    {
        return PnsRwDp3Resource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwDp3Resource::table($table);
    }
}
