<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Buyer Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Favorited Properties -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Favorited Properties</h2>
                @if($favorites->isEmpty())
                    <p class="text-gray-600">No favorited properties.</p>
                @else
                    <ul>
                        @foreach($favorites as $favorite)
                        <li class="mb-2">
                            <a href="{{ route('properties.show', $favorite->property_id) }}" class="text-blue-500 hover:underline">
                                {{ $favorite->property->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Recently Viewed Properties -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Recently Viewed</h2>
                @if($viewHistory->isEmpty())
                    <p class="text-gray-600">No recently viewed properties.</p>
                @else
                    <ul>
                        @foreach($viewHistory as $view)
                        <li class="mb-2">
                            <a href="{{ route('properties.show', $view->property_id) }}" class="text-blue-500 hover:underline">
                                {{ $view->property->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Saved Searches -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Saved Searches</h2>
                @if($savedSearches->isEmpty())
                    <p class="text-gray-600">No saved searches.</p>
                @else
                    <ul>
                        @foreach($savedSearches as $search)
                        <li class="mb-2">
                            <a href="{{ route('properties.index', json_decode($search->criteria, true)) }}" class="text-blue-500 hover:underline">
                                {{ $search->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>