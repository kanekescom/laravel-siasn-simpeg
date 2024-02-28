<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwPwkResource;

class PwksRelationManager extends RelationManager
{
    protected static string $relationship = 'pwks';

    protected static ?string $title = 'PWK';

    public function form(Form $form): Form
    {
        return PnsRwPwkResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwPwkResource::table($table);
    }
}
