<div class="grid grid-cols-3 gap-4 mt-6">
    @foreach ($room->images as $image)
    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Room Image"
        class="transition-transform duration-300 rounded shadow hover:scale-105" />
    @endforeach
</div>