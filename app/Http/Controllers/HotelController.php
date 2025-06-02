<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('coverImage')->get();
        return view('hotels.index', compact('hotels'));
    }

    public function show(Hotel $hotel)
    {
        $hotel->load('rooms.roomType', 'rooms.coverImage', 'reviews.user');
        return view('hotels.show', compact('hotel'));
    }
}
