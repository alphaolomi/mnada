<?php

namespace App\Filament\Resources\AuctionResource\Pages;

use App\Filament\Resources\AuctionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAuction extends ViewRecord
{
    protected static string $resource = AuctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
