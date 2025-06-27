@extends('layouts.app')

@section('content')
<div class="max-w-lg p-4 mx-auto bg-white rounded shadow">
    <h2 class="mb-4 text-xl font-semibold">Upload Gambar Kamar: {{ $room->name }}</h2>

    <form action="{{ route('rooms.upload_images.store', $room) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        <input type="file" name="images[]" multiple required class="block w-full p-2 border rounded" accept="image/*">

        @error('images.*')
        <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror

        <button type="submit"
            class="px-4 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">Upload</button>
    </form>
</div>
@endsection