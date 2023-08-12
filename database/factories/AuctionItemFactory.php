<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuctionItem>
 */
final class AuctionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'          => $this->faker->sentence(),
            'description'    => $this->faker->paragraph(),
            'starting_price' => $this->faker->randomFloat(2, 0, 1000),
            'auction_id'     => \App\Models\Auction::factory(),
            'seller_id'      => \App\Models\User::factory(),
        ];
    }
}
