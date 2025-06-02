<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;


class RoomController extends Controller
{
    public function show(Room $room)
    {
        $room->load('images', 'amenities', 'roomType', 'hotel', 'seasonalPrices');
        $similarRooms = Room::where('room_type_id', $room->room_type_id)
            ->where('id', '!=', $room->id)
            ->with('coverImage')
            ->take(3)
            ->get();

        return view('rooms.show', compact('room', 'similarRooms'));
    }
}
