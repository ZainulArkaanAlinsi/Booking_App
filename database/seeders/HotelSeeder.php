<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run()
    {
        Hotel::create([
            'name' => 'Hotel Bintang Lima',
            'description' => 'Hotel mewah dengan fasilitas lengkap.',
            'address' => 'Jl. Raya No. 123',
            'city' => 'Jakarta',
            'country' => 'Indonesia',
        ]);
    }
}
