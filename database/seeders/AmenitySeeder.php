<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    public function run()
    {
        Amenity::insert([
            ['name' => 'Wi-Fi'],
            ['name' => 'AC'],
            ['name' => 'TV'],
            ['name' => 'Kulkas'],
            ['name' => 'Kolam Renang'],
        ]);
    }
}
