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
        $categories = ['Electronics', 'Fashion', 'Home Decor', 'Sports', 'Books', 'Collectibles'];
        $title = $this->faker->realText(50);
        $category = $this->faker->randomElement($categories);

        return [
            'title'        => $title,
            'description'  => $this->faker->bs(),
            'start_time'   => now(),
            'end_time'     => now()->addDays(7),
            'category'     => $category,
            'is_published' => true,
            'seller_id'    => \App\Models\User::factory(),
            'created_at'        => fake()->dateTimeBetween('-1 months'),
            'updated_at'        => fake()->dateTimeBetween('-1 months'),
        ];
    }

    /**
     * Indicate that the user is suspended.
     */
    public function seller(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'seller_id' => \App\Models\User::factory()->create()->id,
            ];
        });
    }

    /**
     * Indicate that the auction should have items.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withItems(): Factory
    {
        return $this->has(
            \App\Models\AuctionItem::factory()->count(3),
            'items'
        );
    }
}
