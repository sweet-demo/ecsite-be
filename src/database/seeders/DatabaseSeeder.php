<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'status' => User::STATUS_ACTIVE,
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
        ]);
    }
}
