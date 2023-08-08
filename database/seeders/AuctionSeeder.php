<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            $user = User::first();

            $auction  = \App\Models\Auction::factory()->create([
                'title' => 'Test Auction',
                'description' => 'This is a test auction.',
                'is_published' => true,
                'start_time' => now(),
                'end_time' => now()->addDays(7),
                'seller_id' => $user->id,
            ]);

            $auction->items()->saveMany(
                \App\Models\AuctionItem::factory()
                    ->count(2)
                    ->state(['seller_id' => $user->id])
                    ->make()
            );
            DB::commit();
            echo 'Auction seeded successfully.';
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }
}
