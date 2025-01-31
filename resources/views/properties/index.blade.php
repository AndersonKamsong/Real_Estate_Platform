<x-guest-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-2xl font-bold mb-6">Property Listings</h1>
        <form action="{{ route('properties.index') }}" method="GET" class="mb-6">
            <div class="flex flex-wrap -mx-2">
                <div class="w-full md:w-1/4 px-2 mb-4">
                    <input type="text" name="location" placeholder="Location" class="w-full p-2 border rounded" value="{{ request('location') }}">
                </div>
                <div class="w-full md:w-1/4 px-2 mb-4">
                    <input type="number" name="min_price" placeholder="Min Price" class="w-full p-2 border rounded" value="{{ request('min_price') }}">
                </div>
                <div class="w-full md:w-1/4 px-2 mb-4">
                    <input type="number" name="max_price" placeholder="Max Price" class="w-full p-2 border rounded" value="{{ request('max_price') }}">
                </div>
                <div class="w-full md:w-1/4 px-2 mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Filter</button>
                </div>
            </div>
        </form>
        <form action="{{ route('saved-searches.store') }}" method="POST" class="mb-6">
            @csrf
            <input type="hidden" name="name" value="My Search">
            <input type="hidden" name="criteria" value="{{ json_encode(request()->all()) }}">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Save Search</button>
        </form>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($properties as $property)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                @if($property->images->isNotEmpty())
                <img src="{{ asset($property->images->first()->image_path) }}" alt="{{ $property->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">No Image Available</span>
                </div>
                @endif
                <div class="p-4">
                    <h3 class="text-xl font-bold">{{ $property->title }}</h3>
                    <p class="text-gray-600">{{ $property->location }}</p>
                    <p class="text-blue-500 font-bold">${{ number_format($property->price, 2) }}</p>
                    <a href="{{ route('properties.show', $property->id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">View Details</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $properties->links() }}
        </div>
    </div>
</x-guest-layout>