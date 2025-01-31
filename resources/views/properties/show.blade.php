<x-guest-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $property->title }}</h1>
                <p class="text-gray-600 mb-4">{{ $property->location }}</p>
                <p class="text-blue-500 font-bold text-2xl mb-4">${{ number_format($property->price, 2) }}</p>
                <p class="text-gray-700 mb-4">{{ $property->description }}</p>
                <div class="mb-4">
                    <span class="font-bold">Bedrooms:</span> {{ $property->bedrooms }}
                </div>
                <div class="mb-4">
                    <span class="font-bold">Bathrooms:</span> {{ $property->bathrooms }}
                </div>
                <div class="mb-4">
                    <span class="font-bold">Sqft:</span> {{ $property->sqft }}
                </div>
            </div>
            <div>
                <div class="grid grid-cols-2 gap-4 mb-6">
                    @if($property->images->isNotEmpty())
                    @foreach($property->images as $image)
                    <img src="{{ asset($image->image_path) }}" alt="Property Image" class="w-full h-48 object-cover rounded">
                    @endforeach
                    @else
                    <div class="col-span-2 bg-gray-200 p-6 text-center rounded">
                        <span class="text-gray-500">No Images Available</span>
                    </div>
                    @endif
                </div>

                <!-- Rent/Buy Buttons -->
                @if($property->status === 'available')
                <form action="{{ route('properties.rent', $property->id) }}" method="POST" class="mb-4">
                    @csrf
                    <button type="submit" class="w-full bg-green-500 text-white p-2 rounded">Rent This Property</button>
                </form>
                <form action="{{ route('properties.buy', $property->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Buy This Property</button>
                </form>
                @else
                <div class="bg-gray-200 p-4 text-center rounded">
                    <span class="text-gray-600">This property is no longer available.</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>