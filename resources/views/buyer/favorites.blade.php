<x-app-layout>
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-8">Favorited Properties</h1>

    @if($favorites->isEmpty())
        <p class="text-gray-600">You have no favorited properties.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($favorites as $favorite)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                @if($favorite->property->images->isNotEmpty())
                    <img src="{{ asset($favorite->property->images->first()->image_path) }}" alt="{{ $favorite->property->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image Available</span>
                    </div>
                @endif
                <div class="p-4">
                    <h3 class="text-xl font-bold">{{ $favorite->property->title }}</h3>
                    <p class="text-gray-600">{{ $favorite->property->location }}</p>
                    <p class="text-blue-500 font-bold">${{ number_format($favorite->property->price, 2) }}</p>
                    <a href="{{ route('properties.show', $favorite->property_id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
</x-app-layout>
