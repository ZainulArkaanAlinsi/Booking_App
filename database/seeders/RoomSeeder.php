<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $hotel = Hotel::first();
        $types = RoomType::all();

        foreach ($types as $type) {
            Room::create([
                'hotel_id' => $hotel->id,
                'room_type_id' => $type->id,
                'room_number' => 'R' . rand(100, 999),
                'capacity' => rand(1, 4),
                'base_price' => rand(500000, 1500000),
            ]);
        }
    }
}
