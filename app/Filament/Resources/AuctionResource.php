<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuctionResource\Pages;
use App\Filament\Resources\AuctionResource\RelationManagers;
use App\Models\Auction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuctionResource extends Resource
{
    protected static ?string $model = Auction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Fieldset::make('Auction Details')
                    ->schema([
                        // Forms\Components\TextInput::make('seller_id')
                        // ->required()
                        // ->numeric(),
                        Forms\Components\TextInput::make('title')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull(),
                        Forms\Components\DateTimePicker::make('start_time')
                            ->required()
                            ->native(false)
                            ->default(now()),
                        Forms\Components\DateTimePicker::make('end_time')
                            ->native(false)
                            ->required(),
                        Forms\Components\Toggle::make('is_published')
                            ->required(),
                    ]),


                // Forms\Components\Fieldset::make('Auction Items')
                //     ->relationship('items')
                //     ->schema([
                //         Forms\Components\TextInput::make('title')->required(),
                //         Forms\Components\TextInput::make('starting_price')->required()->numeric(),
                //         Forms\Components\Textarea::make('description'),
                //     ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('seller.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuctions::route('/'),
            'create' => Pages\CreateAuction::route('/create'),
            'view' => Pages\ViewAuction::route('/{record}'),
            'edit' => Pages\EditAuction::route('/{record}/edit'),
        ];
    }
}
