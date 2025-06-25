<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Payment extends Model
{
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
