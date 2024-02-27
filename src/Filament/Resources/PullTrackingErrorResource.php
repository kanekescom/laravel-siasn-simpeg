<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingErrorResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PullTrackingError;

class PullTrackingErrorResource extends Resource
{
    protected static ?string $model = PullTrackingError::class;

    protected static ?string $slug = 'pull-tracking-error';

    protected static ?string $pluralLabel = 'Pull Tracking Error';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pull Tracking Error';

    protected static ?string $navigationGroup = 'SIASN SIMPEG ADVANCE';

    protected static bool $shouldRegisterNavigation = true;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pull_tracking_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pns_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('done_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePullTrackingErrors::route('/'),
        ];
    }
}
