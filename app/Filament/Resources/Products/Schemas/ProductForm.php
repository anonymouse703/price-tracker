<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Brand;
use App\Models\Unit;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('brand_id')
                    ->label('Brand')
                    ->options(Brand::query()->pluck('name', 'id'))
                    ->searchable(),
                TextInput::make('name')
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull()
                    ->required(),
                Select::make('unit_id')
                    ->label('Unit')
                    ->options(Unit::query()->pluck('name', 'id'))
                    ->searchable(),
                TextInput::make('barcode'),
                TextInput::make('current_price')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->prefix('₱'),
            ]);
    }
}
