<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function store(Request $request, Room $room)
    {
        $validator = Validator::make($request->all(), [
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1|max:' . $room->max_guests,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $nights = (strtotime($request->check_out) - strtotime($request->check_in)) / (60 * 60 * 24);
        $totalPrice = $nights * $room->current_price;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking berhasil dibuat! Silakan lakukan pembayaran.');
    }

    public function show(Booking $booking)
    {
        $booking->load('room.hotel', 'payment');
        return view('bookings.show', compact('booking'));
    }
}
