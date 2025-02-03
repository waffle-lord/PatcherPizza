<?php

namespace Database\Seeders;

use App\Models\PizzaOrder;
use App\Models\User;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\progress;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $testAccount = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $orderCount = 100;

        progress(
            label: 'adding orders to test account',
            steps: $orderCount,
            callback: function () use ($testAccount) {
            $testAccount->orders()->save(PizzaOrder::factory()->make());
        });
    }
}
