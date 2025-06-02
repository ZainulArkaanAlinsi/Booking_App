<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'address',
        'city',
        'country',
        'phone',
        'email',
        'star_rating',
        'description'
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function coverImage(): HasOne
    {
        return $this->hasOne(RoomImage::class)->where('is_cover', true);
    }
}
