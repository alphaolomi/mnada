<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Auction::factory()->create([
            'title' => 'Test Auction',
            'description' => 'This is a test auction.',
            'is_published' => true,
            'start_time' => now(),
            'end_time' => now()->addDays(7),
            'seller_id' => User::first()->id,
        ]);
    }
}
