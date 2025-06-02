<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Arkaan',
            'email' => 'adminarkaan@gmail.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang diinginkan
            'phone' => '0852-8254-0833',
            'role' => 'admin',
        ]);

        // Tambahkan user biasa untuk testing
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'phone' => '081234567890',
            'role' => 'user',
        ]);
    }
}
