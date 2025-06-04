<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hotel;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Amenity;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create users
        User::factory(10)->create();

        // Create hotels
        Hotel::factory(5)->create();

        // Create room types
        $roomTypes = [
            ['name' => 'Standard', 'base_price' => 100.00],
            ['name' => 'Deluxe', 'base_price' => 150.00],
            ['name' => 'Suite', 'base_price' => 250.00],
        ];

        foreach ($roomTypes as $type) {
            RoomType::create($type);
        }

        // Create amenities
        $amenities = [
            ['name' => 'WiFi'],
            ['name' => 'TV'],
            ['name' => 'AC'],
            ['name' => 'Mini Bar'],
            ['name' => 'Safe'],
            ['name' => 'Jacuzzi'],
        ];

        foreach ($amenities as $amenity) {
            Amenity::create($amenity);
        }

        // Create rooms
        Room::factory(20)->create()->each(function ($room) use ($amenities) {
            // Attach random amenities
            $room->amenities()->attach(
                Amenity::inRandomOrder()->limit(rand(3, 6))->pluck('id')->toArray()
            );
        });
    }
}
