<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        Review::create([
            'user_id' => User::first()->id,
            'hotel_id' => Hotel::first()->id,
            'rating' => 5,
            'comment' => 'Sangat puas dengan pelayanan dan kebersihan hotel!',
        ]);
    }
}
