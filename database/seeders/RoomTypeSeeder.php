<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    public function run()
    {
        RoomType::insert([
            ['name' => 'Standard', 'description' => 'Kamar standar dengan fasilitas dasar.'],
            ['name' => 'Deluxe', 'description' => 'Kamar deluxe lebih luas dan nyaman.'],
            ['name' => 'Suite', 'description' => 'Kamar suite mewah dengan ruang tamu.']
        ]);
    }
}
