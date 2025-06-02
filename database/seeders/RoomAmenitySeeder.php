<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Amenity;
use Illuminate\Database\Seeder;

class RoomAmenitySeeder extends Seeder
{
    public function run()
    {
        $rooms = Room::all();
        $amenities = Amenity::all();

        foreach ($rooms as $room) {
            $room->amenities()->attach(
                $amenities->random(rand(2, 4))->pluck('id')->toArray()
            );
        }
    }
}
