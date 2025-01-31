<x-agent-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Edit Property</h1>

        <form action="{{ route('agent.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full p-2 border rounded" value="{{ $property->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full p-2 border rounded" rows="4" required>{{ $property->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input type="number" name="price" id="price" class="w-full p-2 border rounded" value="{{ $property->price }}" required>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700">Type</label>
                <select name="type" id="type" class="w-full p-2 border rounded" required>
                    <option value="rent" {{ $property->type === 'rent' ? 'selected' : '' }}>Rent</option>
                    <option value="buy" {{ $property->type === 'buy' ? 'selected' : '' }}>Buy</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="bedrooms" class="block text-gray-700">Bedrooms</label>
                <input type="number" name="bedrooms" id="bedrooms" class="w-full p-2 border rounded" value="{{ $property->bedrooms }}" required>
            </div>
            <div class="mb-4">
                <label for="bathrooms" class="block text-gray-700">Bathrooms</label>
                <input type="number" name="bathrooms" id="bathrooms" class="w-full p-2 border rounded" value="{{ $property->bathrooms }}" required>
            </div>
            <div class="mb-4">
                <label for="sqft" class="block text-gray-700">Sqft</label>
                <input type="number" name="sqft" id="sqft" class="w-full p-2 border rounded" value="{{ $property->sqft }}" required>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700">Location</label>
                <input type="text" name="location" id="location" class="w-full p-2 border rounded" value="{{ $property->location }}" required>
            </div>
            <div class="mb-4">
                <label for="images" class="block text-gray-700">Images</label>
                <input type="file" name="images[]" id="images" class="w-full p-2 border rounded" multiple>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Update Property</button>
        </form>
    </div>
</x-agent-layout>
