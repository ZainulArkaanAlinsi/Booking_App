<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\SeasonalPrice;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeasonalPriceSeeder extends Seeder
{
    public function run()
    {
        $rooms = Room::all();

        foreach ($rooms as $room) {
            SeasonalPrice::create([
                'room_id' => $room->id,
                'price' => $room->base_price * 1.2,
                'start_date' => Carbon::now()->addDays(30),
                'end_date' => Carbon::now()->addDays(60),
            ]);
        }
    }
}
