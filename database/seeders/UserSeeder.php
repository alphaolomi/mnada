<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

final class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            \App\Models\User::factory(110)->create();

            // \App\Models\User::factory()->create([
            //     'name'  => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
