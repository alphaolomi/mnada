<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Auction;
use App\Models\Bid;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Auctions', Auction::count()),
            Stat::make('Active Auctions', Auction::where('is_published', true)->count()),
            // Count Bid for Active Auctions only
            Stat::make('Total Bids', Bid::query()->whereIn('auction_id', Auction::where('is_published', true)->pluck('id'))->count()),
        ];
    }
}
