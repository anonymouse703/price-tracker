<?php

namespace App\Filament\Resources\Units\Tables;

use App\Models\Unit;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class UnitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('symbol')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->defaultSort('created_at','desc')
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('toggleActive')
                        ->label(fn (Unit $record) => $record->is_active ? 'Deactivate' : 'Activate')
                        ->icon(fn (Unit $record) => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn (Unit $record) => $record->is_active ? 'warning' : 'success')
                        ->requiresConfirmation()
                        ->modalHeading(fn (Unit $record) => $record->is_active ? 'Deactivate Unit' : 'Activate Unit')
                        ->modalDescription(fn (Unit $record) => $record->is_active 
                            ? 'Are you sure you want to deactivate this unit?' 
                            : 'Are you sure you want to activate this unit?')
                        ->action(function (Unit $record) {
                            $record->update(['is_active' => !$record->is_active]);
                        })
                        ->successNotificationTitle(fn (Unit $record) => $record->is_active ? 'Unit activated' : 'Unit deactivated'),
                    EditAction::make(),
                    DeleteAction::make()
                        ->successNotificationTitle('Unit Deleted')
                        ->requiresConfirmation()
                ])
            ])
            ->toolbarActions([
            ]);
    }
}
