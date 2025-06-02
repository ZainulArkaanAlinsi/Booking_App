<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Database\Seeder;

class RoomImageSeeder extends Seeder
{
    public function run()
    {
        $rooms = Room::all();

        foreach ($rooms as $room) {
            RoomImage::create([
                'room_id' => $room->id,
                'image_path' => 'images/room_default.jpg', // pakai gambar default dulu
            ]);
        }
    }
}
