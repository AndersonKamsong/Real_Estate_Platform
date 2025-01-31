<x-agent-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">My Listings</h1>
            <a href="{{ route('agent.properties.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                + Add New Property
            </a>
        </div>

        @if($properties->isEmpty())
            <p class="text-gray-600">You have no listed properties.</p>
        @else
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

                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('agent.properties.edit', $property->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Edit
                            </a>

                            @if($property->status === 'available') 
                                <form action="{{ route('agent.properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this property?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-agent-layout>
