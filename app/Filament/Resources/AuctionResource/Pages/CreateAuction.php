<?php

declare(strict_types=1);

namespace App\Filament\Resources\AuctionResource\Pages;

use App\Filament\Resources\AuctionResource;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

final class CreateAuction extends CreateRecord
{
    protected static string $resource = AuctionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->icon('heroicon-o-check-circle')
            ->title('Auction created successfully')
            ->body('You have successfully created an auction.')
            ->actions([
                // Action::make('Open Auction')
                //     ->button()
                //     ->url(fn () => url('auctions.show', $this->record)),
            ]);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
