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
            'name' => 'Raditya Arya Wiguna',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'address' => 'Perumahan Sehati',
            'role' => 'Admin',
        ]);
        User::create([
            'email' => 'daniel@gmail.com',
            'name' => 'Johnson Daniel',
            'username' => 'daniel',
            'password' => Hash::make('daniel123'),
            'address' => 'Perumahan Abadi',
            'role' => 'User',
        ]);
        User::create([
            'email' => 'asep@gmail.com',
            'name' => 'Asep Setiawan',
            'username' => 'asep',
            'password' => Hash::make('asep123'),
            'address' => 'Perumahan Bahagia',
            'role' => 'Officer',
        ]);        

    }
}
