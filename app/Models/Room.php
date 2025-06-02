<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(RoomImage::class);
    }

    public function coverImage(): HasOne
    {
        return $this->hasOne(RoomImage::class)->where('is_cover', true);
    }

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'room_amenities');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function seasonalPrices(): HasMany
    {
        return $this->hasMany(SeasonalPrice::class);
    }

    public function getCurrentPriceAttribute()
    {
        $today = now()->format('Y-m-d');
        $seasonalPrice = $this->seasonalPrices()
            ->where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->first();

        return $seasonalPrice ? $seasonalPrice->adjusted_price : $this->price;
    }
}
