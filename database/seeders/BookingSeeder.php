<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $room = Room::first();

        Booking::create([
            'user_id' => $user->id,
            'room_id' => $room->id,
            'check_in' => Carbon::now()->addDays(5),
            'check_out' => Carbon::now()->addDays(8),
            'guest_count' => 2,
            'total_price' => $room->base_price * 3,
            'status' => 'confirmed',
        ]);
    }
}
