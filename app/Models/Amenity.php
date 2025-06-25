<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Room;


class Amenity extends Model
{
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_amenities');
    }
}
