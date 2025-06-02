@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Booking Confirmation</h3>
                </div>

                <div class="card-body">
                    <div class="alert alert-success">
                        <h4 class="alert-heading">Booking Successful!</h4>
                        <p>Your booking has been confirmed. Booking ID: <strong>#{{ $booking->id }}</strong></p>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Booking Details</h5>
                            <p><strong>Room:</strong> {{ $booking->room->roomType->name }} - {{
                                $booking->room->room_number }}</p>
                            <p><strong>Hotel:</strong> {{ $booking->room->hotel->name }}</p>
                            <p><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->format('M d, Y')
                                }}</p>
                            <p><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($booking->check_out)->format('M d,
                                Y') }}</p>
                            <p><strong>Duration:</strong> {{ $booking->nights }} nights</p>
                            <p><strong>Guests:</strong> {{ $booking->guests }}</p>
                        </div>

                        <div class="col-md-6">
                            <h5>Price Summary</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Room Price (per night)</td>
                                    <td>Rp {{ number_format($booking->room->current_price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Nights</td>
                                    <td>{{ $booking->nights }}</td>
                                </tr>
                                <tr class="table-success">
                                    <td><strong>Total Price</strong></td>
                                    <td><strong>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="border-top pt-3">
                        <h5>Payment Information</h5>
                        @if($booking->payment)
                        <div class="alert alert-info">
                            <p>Payment Status: <span class="badge bg-success">{{ ucfirst($booking->payment->status)
                                    }}</span></p>
                            <p>Payment Method: {{ $booking->payment->payment_method }}</p>
                            <p>Payment Date: {{ $booking->payment->payment_date }}</p>
                        </div>
                        @else
                        <div class="alert alert-warning">
                            <p>Payment pending. Please complete your payment to secure your booking.</p>
                            <a href="#" class="btn btn-primary">Make Payment</a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('rooms.show', $booking->room) }}" class="btn btn-outline-secondary">
                            Back to Room
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            View My Bookings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection