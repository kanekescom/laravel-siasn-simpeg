<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PullTrackingResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ErrorsRelationManager extends RelationManager
{
    protected static string $relationship = 'errors';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('pns_id')
            ->columns([
                Tables\Columns\TextColumn::make('#')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('pegawai.nip_baru')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('NIP'),
                Tables\Columns\TextColumn::make('done_at')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
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
            ->headerActions([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
