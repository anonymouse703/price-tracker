<?php

namespace App\Filament\Resources\Products\Tables;

use App\Models\Product;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Exports\ProductExporter;
use App\Filament\Imports\ProductImporter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ForceDeleteBulkAction;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('brand.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('unit.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                TextColumn::make('barcode')
                    ->searchable(),
                TextColumn::make('current_price')
                    ->money('Php')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->defaultSort('created_at', 'desc')
            ->headerActions([
                ImportAction::make()
                    ->importer(ProductImporter::class),
                ExportAction::make()
                     ->exporter(ProductExporter::class)
            ])
            ->filters([
                // TrashedFilter::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('updatePrice')
                        ->label('Update Price')
                        ->icon('heroicon-o-currency-dollar')
                        ->color('warning')
                        ->schema([
                            TextInput::make('new_price')
                                ->label('New Price')
                                ->required()
                                ->numeric()
                                ->minValue(0)
                                ->prefix('₱')
                                ->helperText(fn($record) => 'Current price: ₱' . number_format($record->current_price, 2))
                        ])
                        ->action(function (Product $record, array $data) {
                            $record->updatePrice($data['new_price']);
                        })
                        ->successNotificationTitle('Price updated successfully')
                        ->visible(fn() => Auth::check()),

                    Action::make('toggleActive')
                        ->label(fn(Product $record) => $record->is_active ? 'Deactivate' : 'Activate')
                        ->icon(fn(Product $record) => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn(Product $record) => $record->is_active ? 'warning' : 'success')
                        ->requiresConfirmation()
                        ->modalHeading(fn(Product $record) => $record->is_active ? 'Deactivate Product' : 'Activate Product')
                        ->modalDescription(fn(Product $record) => $record->is_active
                            ? 'Are you sure you want to deactivate this product?'
                            : 'Are you sure you want to activate this product?')
                        ->action(function (Product $record) {
                            $record->update(['is_active' => !$record->is_active]);
                        })
                        ->successNotificationTitle(fn(Product $record) => $record->is_active ? 'Product activated' : 'Product deactivated'),
                    EditAction::make(),
                    DeleteAction::make()
                        ->successNotificationTitle('Product Deleted')
                        ->requiresConfirmation()
                ])
            ])
            ->toolbarActions([]);
    }
}
