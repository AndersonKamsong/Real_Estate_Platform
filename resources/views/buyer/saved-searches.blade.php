<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Saved Searches</h1>

        @if($savedSearches->isEmpty())
            <p class="text-gray-600">You have no saved searches.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($savedSearches as $search)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $search->name }}</h3>
                    <p class="text-gray-600 mb-4">
                        @foreach(json_decode($search->criteria, true) as $key => $value)
                            <span class="block">{{ ucfirst($key) }}: {{ $value }}</span>
                        @endforeach
                    </p>
                    <!-- View Results Button -->
                    <a href="{{ route('properties.index', json_decode($search->criteria, true)) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">View Results</a>
                    <!-- Delete Button -->
                    <form action="{{ route('saved-searches.destroy', $search->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                    </form>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>