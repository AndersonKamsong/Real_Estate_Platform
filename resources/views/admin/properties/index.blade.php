<x-admin-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Manage Properties</h1>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Location</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Price</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4">{{ $property->title }}</td>
                        <td class="px-6 py-4">{{ $property->location }}</td>
                        <td class="px-6 py-4">${{ number_format($property->price, 2) }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('agent.properties.edit', $property->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('agent.properties.destroy', $property->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>