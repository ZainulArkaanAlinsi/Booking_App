<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\RoomType;
use App\Models\Amenity;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::with('rooms.images')->paginate(10);
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::all();
        $roomTypes = RoomType::all();
        $amenities = Amenity::all();
        return view('rooms.roomnya', compact('hotels', 'roomTypes', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'amenities' => 'array',
            'amenities.*' => 'exists:amenities,id',
        ]);

        $room = Room::create($validated);
        if (isset($validated['amenities'])) {
            $room->amenities()->sync($validated['amenities']);
        }

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(Hotel $hotel)
    {
        $hotel->load('rooms.roomType', 'rooms.amenities', 'rooms.images', 'rooms.seasonalPrices');
        return view('hotels.show', compact('hotel'));
    }


    public function showUploadForm(Room $room)
    {
        return view('rooms.upload_images', compact('room'));
    }

    public function uploadImages(Request $request, Room $room)
    {
        $request->validate([
            'images.*' => 'required|image|max:2048',
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('room_images', 'public');
            $room->images()->create(['image_path' => $path]);
        }

        return redirect()->route('rooms.show', $room)->with('success', 'Images uploaded successfully.');
    }
}
