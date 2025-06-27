@extends('layouts.app')

@section('content')
<form action="{{ route('rooms.store') }}" method="POST" class="max-w-lg p-4 mx-auto bg-white rounded shadow">
    @csrf

    <label for="hotel_id" class="block mb-1 font-semibold">Hotel</label>
    <select name="hotel_id" id="hotel_id" required class="w-full p-2 mb-4 border rounded">
        <option value="">Pilih Hotel</option>
        @foreach($hotels as $hotel)
        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
        @endforeach
    </select>

    <label for="name" class="block mb-1 font-semibold">Nama Kamar</label>
    <input type="text" name="name" id="name" required class="w-full p-2 mb-4 border rounded" value="{{ old('name') }}">

    <label for="description" class="block mb-1 font-semibold">Deskripsi</label>
    <textarea name="description" id="description"
        class="w-full p-2 mb-4 border rounded">{{ old('description') }}</textarea>

    <label for="price_per_night" class="block mb-1 font-semibold">Harga per Malam</label>
    <input type="number" name="price_per_night" id="price_per_night" required class="w-full p-2 mb-4 border rounded"
        value="{{ old('price_per_night') }}" step="0.01">

    <label for="capacity" class="block mb-1 font-semibold">Kapasitas Tamu</label>
    <input type="number" name="capacity" id="capacity" required class="w-full p-2 mb-4 border rounded"
        value="{{ old('capacity') }}">

    <label class="block mb-1 font-semibold">Fasilitas</label>
    <div class="mb-4">
        @foreach($amenities as $amenity)
        <label class="inline-flex items-center mr-4">
            <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}" class="form-checkbox">
            <span class="ml-2">{{ $amenity->name }}</span>
        </label>
        @endforeach
    </div>

    <button type="submit" class="px-4 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
</form>
@endsection