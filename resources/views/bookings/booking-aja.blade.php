@extends('layouts.app')

@section('content')
<div class="max-w-md p-6 mx-auto bg-white rounded shadow-lg" x-data="{ step: 1 }">
    <h2 class="mb-4 text-2xl font-bold">Form Booking Kamar</h2>

    <!-- Step 1: Pilih Kamar -->
    <div x-show="step === 1" x-transition>
        <label for="room_id" class="block mb-1 font-semibold">Pilih Kamar</label>
        <select id="room_id" name="room_id" class="w-full p-2 mb-4 border rounded">
            @foreach ($rooms as $room)
            <option value="{{ $room->id }}">{{ $room->name }} - Rp{{ number_format($room->price_per_night) }}/malam
            </option>
            @endforeach
        </select>
        <button @click="step = 2"
            class="px-4 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">Lanjut</button>
    </div>

    <!-- Step 2: Isi Detail -->
    <div x-show="step === 2" x-transition>
        <label for="check_in" class="block mb-1 font-semibold">Tanggal Check-in</label>
        <input type="date" id="check_in" name="check_in" class="w-full p-2 mb-4 border rounded">

        <label for="check_out" class="block mb-1 font-semibold">Tanggal Check-out</label>
        <input type="date" id="check_out" name="check_out" class="w-full p-2 mb-4 border rounded">

        <label for="guests" class="block mb-1 font-semibold">Jumlah Tamu</label>
        <input type="number" id="guests" name="guests" min="1" class="w-full p-2 mb-4 border rounded">

        <div class="flex justify-between">
            <button @click="step = 1"
                class="px-4 py-2 text-white transition bg-gray-400 rounded hover:bg-gray-500">Kembali</button>
            <button type="submit"
                class="px-4 py-2 text-white transition bg-green-600 rounded hover:bg-green-700">Booking</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
@endsection