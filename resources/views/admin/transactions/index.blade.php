<x-admin-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Manage Transactions</h1>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Property</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Type</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4">
                            <a href="{{ route('properties.show', $transaction->property_id) }}" class="text-blue-500 hover:underline">
                                {{ $transaction->property->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-sm rounded-full 
                                {{ $transaction->type === 'rented' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ ucfirst($transaction->type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $transaction->transaction_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>