<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Room;

class RoomImage extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
