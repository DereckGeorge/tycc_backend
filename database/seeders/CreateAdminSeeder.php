<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Delete existing admin user if exists
        User::where('email', 'admin@tycc.or.tz')->delete();

        // Create new admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@tycc.or.tz',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
} 