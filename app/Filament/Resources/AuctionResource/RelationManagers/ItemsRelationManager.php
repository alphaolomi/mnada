<?php

declare(strict_types=1);

namespace App\Filament\Resources\AuctionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;

final class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Auction Items';

    protected static ?string $icon = 'heroicon-o-clipboard-list';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('starting_price')
                    ->required()
                    // ->numeric()
                    ->inputMode('decimal')
                    ->prefix('TZS')
                    ->mask(RawJs::make(<<<'JS'
                    $money($input)
                JS)),
                Forms\Components\Textarea::make('description'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('starting_price')
                    ->numeric(
                        decimalPlaces: 2,
                        decimalSeparator: '.',
                        thousandsSeparator: ',',
                    ),
                Tables\Columns\TextColumn::make('description')->limit(30),
            ])
            ->filters([

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                    // remove commas from the price
                    $data['starting_price'] = (float) str_replace(',', '', $data['starting_price']);
                    $data['seller_id']      = auth()->user()->id;

                    return $data;
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->mutateFormDataUsing(function (array $data): array {
                    // remove commas from the price
                    $data['starting_price'] = (float) str_replace(',', '', $data['starting_price']);
                    $data['seller_id']      = auth()->user()->id;

                    return $data;
                }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                    // remove commas from the price
                    $data['starting_price'] = (float) str_replace(',', '', $data['starting_price']);
                    $data['seller_id']      = auth()->user()->id;

                    return $data;
                }),
            ]);
    }
}
