<?php

namespace App\Filament\Widgets;

use App\Models\Auction;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;


class AuctionChart extends ChartWidget
{
    protected static ?string $heading = 'Auctions Chart';

    protected static ?string $description = 'A chart showing the number of auctions created over time.';

    public ?string $filter = 'today';

    protected static ?int $sort = 3;

    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
        'scales' => [
            'y' => [
                'beginAtZero' => true,
            ],
        ],
    ];

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $filters = [
            'today' => ["start" => now()->startOfDay(), "end" => now()->endOfDay(), "interval" => "hour"],
            'yesterday' => ["start" => now()->subDay()->startOfDay(), "end" => now()->subDay()->endOfDay(), "interval" => "hour"],
            'week' => ["start" => now()->startOfWeek(), "end" => now()->endOfWeek(), "interval" => "day"],
            'month' => ["start" => now()->startOfMonth(), "end" => now()->endOfMonth(), "interval" => "day"],
            'year' => ["start" => now()->startOfYear(), "end" => now()->endOfYear(), "interval" => "month"],
        ];

        $data = Trend::query(Auction::query())
            ->between($filters[$activeFilter]["start"], $filters[$activeFilter]["end"])
            ->interval($filters[$activeFilter]["interval"])
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Auctions Count',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'yesterday' => 'Yesterday',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'Last year',
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
