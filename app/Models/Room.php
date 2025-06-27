<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoomImage;


class Room extends Model
{


    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'room_number',
        'price',
        'max_guests',
        'is_available',
        'description'
    ];
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
    public function seasonalPrices()
    {
        return $this->hasMany(SeasonalPrice::class);
    }
}
