@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Hotels</h1>

    <div class="row">
        @foreach($hotels as $hotel)
        <div class="col-md-4 mb-4">
            <div class="card hotel-card h-100">
                @if($hotel->coverImage)
                <img src="{{ asset($hotel->coverImage->image_url) }}" class="card-img-top" alt="{{ $hotel->name }}"
                    style="height: 200px; object-fit: cover;">
                @else
                <div class="bg-secondary"
                    style="height: 200px; display: flex; align-items: center; justify-content: center;">
                    <span class="text-white">No Image</span>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $hotel->name }}</h5>
                    <div class="star-rating mb-2">
                        @for($i = 1; $i <= 5; $i++) @if($i <=$hotel->star_rating)
                            <i class="bi bi-star-fill"></i>
                            @else
                            <i class="bi bi-star"></i>
                            @endif
                            @endfor
                    </div>
                    <p class="card-text text-truncate">{{ $hotel->description }}</p>
                    <p class="card-text"><i class="bi bi-geo-alt"></i> {{ $hotel->city }}, {{ $hotel->country }}</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('hotels.show', $hotel) }}" class="btn btn-primary">View Hotel</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection