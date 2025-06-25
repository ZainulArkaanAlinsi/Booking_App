<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'room_amenities');
    }
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
