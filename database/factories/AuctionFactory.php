<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auction>
 */
final class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'        => $this->faker->sentence(),
            'description'  => $this->faker->paragraph(),
            'start_time'   => now(),
            'end_time'     => now()->addDays(7),
            'is_published' => true,
            'seller_id'    => \App\Models\User::factory(),
        ];
    }
}
