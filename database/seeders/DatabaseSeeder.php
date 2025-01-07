<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'name' => 'Dilshoda',
            'email' => 'qambarovadilshoda867@gmail.com',
            'password' => bcrypt('123456'),
            'verification_token' => Str::random(20),
            'email_verified_at' => now()
        ]);
    }
}
