@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h1>{{ $room->roomType->name }} - Room {{ $room->room_number }}</h1>
                    <p class="lead">at {{ $room->hotel->name }}</p>

                    <div class="room-gallery">
                        @foreach($room->images as $image)
                        <div class="gallery-img">
                            <img src="{{ asset($image->image_url) }}" alt="Room Image" data-bs-toggle="modal"
                                data-bs-target="#imageModal" data-bs-img="{{ asset($image->image_url) }}">
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h3>Rp {{ number_format($room->current_price, 0, ',', '.') }} <small
                                class="text-muted">/night</small></h3>
                        <div>
                            <span class="badge bg-{{ $room->is_available ? 'success' : 'danger' }}">
                                {{ $room->is_available ? 'Available' : 'Not Available' }}
                            </span>
                        </div>
                    </div>

                    <h4 class="mt-4">Description</h4>
                    <p>{{ $room->description }}</p>

                    <h4 class="mt-4">Room Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="bi bi-people"></i> Max Guests: {{ $room->max_guests }}</p>
                            <p><i class="bi bi-house-door"></i> Room Type: {{ $room->roomType->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="bi bi-building"></i> Hotel: {{ $room->hotel->name }}</p>
                            <p><i class="bi bi-geo-alt"></i> {{ $room->hotel->city }}, {{ $room->hotel->country }}</p>
                        </div>
                    </div>

                    <h4 class="mt-4">Amenities</h4>
                    <div class="mb-4">
                        @foreach($room->amenities as $amenity)
                        <span class="amenity-badge">
                            <i class="{{ $amenity->icon ?? 'bi bi-check-circle' }}"></i> {{ $amenity->name }}
                        </span>
                        @endforeach
                    </div>

                    @if($room->seasonalPrices->count() > 0)
                    <h4 class="mt-4">Seasonal Prices</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Period</th>
                                    <th>Price/Night</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($room->seasonalPrices as $price)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($price->start_date)->format('M d, Y') }} - {{
                                        \Carbon\Carbon::parse($price->end_date)->format('M d, Y') }}</td>
                                    <td>Rp {{ number_format($price->adjusted_price, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Book This Room</h4>
                </div>
                <div class="card-body">
                    @if($room->is_available)
                    <form method="POST" action="{{ route('bookings.store', $room) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="check_in" class="form-label">Check-in Date</label>
                            <input type="date" class="form-control" id="check_in" name="check_in"
                                min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="check_out" class="form-label">Check-out Date</label>
                            <input type="date" class="form-control" id="check_out" name="check_out" required>
                        </div>
                        <div class="mb-3">
                            <label for="guests" class="form-label">Number of Guests</label>
                            <input type="number" class="form-control" id="guests" name="guests" min="1"
                                max="{{ $room->max_guests }}" value="1" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                    </form>
                    @else
                    <div class="alert alert-warning">
                        This room is currently not available for booking.
                    </div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Similar Rooms</h4>
                </div>
                <div class="card-body">
                    @foreach($similarRooms as $similar)
                    <div class="mb-3 border-bottom pb-3">
                        <div class="d-flex">
                            @if($similar->coverImage)
                            <img src="{{ asset($similar->coverImage->image_url) }}" alt="{{ $similar->roomType->name }}"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                            @else
                            <div class="bg-secondary"
                                style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                                <span class="text-white">No Image</span>
                            </div>
                            @endif
                            <div class="ms-3">
                                <h5 class="mb-1">{{ $similar->roomType->name }}</h5>
                                <p class="mb-1">Room {{ $similar->room_number }}</p>
                                <p class="mb-0"><strong>Rp {{ number_format($similar->current_price, 0, ',', '.')
                                        }}/night</strong></p>
                                <a href="{{ route('rooms.show', $similar) }}"
                                    class="btn btn-sm btn-outline-primary mt-1">View</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid" alt="Room Image">
            </div>
        </div>
    </div>
</div>

<script>
    const imageModal = document.getElementById('imageModal')
    imageModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const imageUrl = button.getAttribute('data-bs-img')
        const modalImage = document.getElementById('modalImage')
        modalImage.src = imageUrl
    })
</script>
@endsection