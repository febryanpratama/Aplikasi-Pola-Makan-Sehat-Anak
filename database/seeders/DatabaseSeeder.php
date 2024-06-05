<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // For Admin
        \App\Models\User::factory()->create(
            [
                'name' => 'Saya Admin',
                'email' => 'admin@example.com',
                'is_admin' => true,
            ],
        );

        // For User
        \App\Models\User::factory()->create(
            [
                'name' => 'Saya User',
                'email' => 'user@example.com',
                'is_admin' => false,
            ],
        );

        // Generate 10 users fake
        \App\Models\User::factory(10)->create();

        // Generate Food from load data json
        $this->call(FoodSeeder::class);
    }
}
