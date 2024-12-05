<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generate multiple users with the factory if needed
        User::factory(10)->create();

        // Create a specific test user with a hashed pin
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'pin' => Hash::make('1234'), // Hash the pin here
        ]);
    }
}
