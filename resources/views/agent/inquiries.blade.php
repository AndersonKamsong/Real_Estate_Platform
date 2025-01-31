<x-agent-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Inquiries Received</h1>

        @if($inquiries->isEmpty())
            <p class="text-gray-600">You have no inquiries.</p>
        @else
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Property</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Buyer</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inquiries as $inquiry)
                        <tr class="border-b border-gray-200">
                            <td class="px-6 py-4">
                                <a href="{{ route('properties.show', $inquiry->property_id) }}" class="text-blue-500 hover:underline">
                                    {{ $inquiry->property->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4">{{ $inquiry->user->name }}</td>
                            <td class="px-6 py-4">{{ $inquiry->user->email }}</td>
                            <td class="px-6 py-4">{{ $inquiry->message }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-agent-layout>