<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Recently Viewed Properties</h1>

        @if($viewHistory->isEmpty())
            <p class="text-gray-600">You have not viewed any properties recently.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($viewHistory as $view)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    @if($view->property->images->isNotEmpty())
                        <img src="{{ asset($view->property->images->first()->image_path) }}" alt="{{ $view->property->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image Available</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="text-xl font-bold">{{ $view->property->title }}</h3>
                        <p class="text-gray-600">{{ $view->property->location }}</p>
                        <p class="text-blue-500 font-bold">${{ number_format($view->property->price, 2) }}</p>
                        <a href="{{ route('properties.show', $view->property_id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>