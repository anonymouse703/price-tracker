<?php

namespace App\Filament\Resources\Brands\Tables;

use App\Models\Brand;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('description')
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
                        ->label(fn (Brand $record) => $record->is_active ? 'Deactivate' : 'Activate')
                        ->icon(fn (Brand $record) => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn (Brand $record) => $record->is_active ? 'warning' : 'success')
                        ->requiresConfirmation()
                        ->modalHeading(fn (Brand $record) => $record->is_active ? 'Deactivate Brand' : 'Activate Brand')
                        ->modalDescription(fn (Brand $record) => $record->is_active 
                            ? 'Are you sure you want to deactivate this brand?' 
                            : 'Are you sure you want to activate this brand?')
                        ->action(function (Brand $record) {
                            $record->update(['is_active' => !$record->is_active]);
                        })
                        ->successNotificationTitle(fn (Brand $record) => $record->is_active ? 'Brand activated' : 'Brand deactivated'),
                    EditAction::make(),
                    DeleteAction::make()
                        ->successNotificationTitle('Brand Deleted')
                        ->requiresConfirmation()
                ])
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
