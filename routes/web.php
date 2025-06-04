<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/check-availability', [BookingController::class, 'checkAvailability']);
    Route::post('/bookings', [BookingController::class, 'store']);
});
