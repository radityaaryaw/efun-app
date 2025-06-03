<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'address' => 'Jalan aja ga jadian',
            'role' => 'Admin',
        ]);

    }
}
