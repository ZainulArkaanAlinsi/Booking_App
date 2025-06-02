@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h2>{{ $hotel->name }}</h2>
                    <div class="star-rating mb-2">
                        @for($i = 1; $i <= 5; $i++) @if($i <=$hotel->star_rating)
                            <i class="bi bi-star-fill"></i>
                            @else
                            <i class="bi bi-star"></i>
                            @endif
                            @endfor
                    </div>
                    <p class="mb-0"><i class="bi bi-geo-alt"></i> {{ $hotel->address }}, {{ $hotel->city }}, {{
                        $hotel->country }}</p>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><i class="bi bi-telephone"></i> {{ $hotel->phone }}</p>
                            <p><i class="bi bi-envelope"></i> {{ $hotel->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="bi bi-people"></i> {{ $hotel->rooms->count() }} Rooms Available</p>
                        </div>
                    </div>

                    <h4>Description</h4>
                    <p>{{ $hotel->description }}</p>

                    <h4 class="mt-4">Available Rooms</h4>
                    <div class="row">
                        @foreach($hotel->rooms as $room)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                @if($room->coverImage)
                                <img src="{{ asset($room->coverImage->image_url) }}" class="card-img-top"
                                    alt="{{ $room->roomType->name }}" style="height: 150px; object-fit: cover;">
                                @else
                                <div class="bg-secondary"
                                    style="height: 150px; display: flex; align-items: center; justify-content: center;">
                                    <span class="text-white">No Image</span>
                                </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $room->roomType->name }}</h5>
                                    <p class="card-text">Room {{ $room->room_number }}</p>
                                    <p class="card-text">Max Guests: {{ $room->max_guests }}</p>
                                    <p class="card-text"><strong>Rp {{ number_format($room->current_price, 0, ',', '.')
                                            }}/night</strong></p>
                                    <a href="{{ route('rooms.show', $room) }}"
                                        class="btn btn-sm btn-outline-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>Reviews</h4>
                </div>
                <div class="card-body">
                    @if($hotel->reviews->count() > 0)
                    @foreach($hotel->reviews as $review)
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex justify-content-between">
                            <h5>{{ $review->user->name }}</h5>
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++) @if($i <=$review->rating)
                                    <i class="bi bi-star-fill"></i>
                                    @else
                                    <i class="bi bi-star"></i>
                                    @endif
                                    @endfor
                            </div>
                        </div>
                        <p class="text-muted">{{ $review->created_at->format('M d, Y') }}</p>
                        <p>{{ $review->comment }}</p>
                    </div>
                    @endforeach
                    @else
                    <p>No reviews yet.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Hotel Information</h4>
                </div>
                <div class="card-body">
                    <div id="map"
                        style="height: 200px; background-color: #eee; border-radius: 5px; margin-bottom: 15px;"></div>
                    <p><i class="bi bi-geo-alt"></i> {{ $hotel->address }}</p>
                    <p><i class="bi bi-telephone"></i> {{ $hotel->phone }}</p>
                    <p><i class="bi bi-envelope"></i> {{ $hotel->email }}</p>
                    <p><i class="bi bi-star"></i> {{ $hotel->star_rating }} Star Hotel</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Contact Hotel</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection