<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create regular user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create categories
        Category::create([
            'name' => 'Bioskop',
            'description' => 'Reservasi kursi bioskop'
        ]);

        Category::create([
            'name' => 'Hotel',
            'description' => 'Reservasi kamar hotel'
        ]);

        Category::create([
            'name' => 'Restoran',
            'description' => 'Reservasi meja restoran'
        ]);

        Category::create([
            'name' => 'Meeting Room',
            'description' => 'Reservasi ruang meeting'
        ]);
    }
}