<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PriceHistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'priceHistories';

    protected static ?string $recordTitleAttribute = 'new_price';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('old_price')
                    ->label('Old Price')
                    ->required()
                    ->numeric(),
                TextInput::make('new_price')
                    ->label('New Price')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->label('Updated By (User ID)')
                    ->required()
                    ->numeric(),
                TextInput::make('changed_at')
                    ->label('Changed At')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('new_price')
            ->columns([
                TextColumn::make('old_price')
                    ->label('Old Price')
                    ->money('Php')
                    ->sortable(),
                TextColumn::make('new_price')
                    ->label('New Price')
                    ->money('Php')
                    ->sortable(),
                TextColumn::make('changed_at')
                    ->label('Changed At')
                    ->dateTime('F j, Y, g:i a')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Updated By')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // CreateAction::make(),
                // AssociateAction::make(),
            ])
            ->recordActions([
            ])
            ->toolbarActions([
            ]);
    }
}
