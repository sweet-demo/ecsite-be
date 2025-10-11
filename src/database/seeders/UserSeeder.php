<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
           'status' => User::STATUS_ACTIVE,
           'email' => 'test@example.com',
           'email_verified_at' => now(),
           'password' => Hash::make('secret'),
        ]);
    }
}
