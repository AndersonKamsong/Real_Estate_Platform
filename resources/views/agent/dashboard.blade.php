<x-agent-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Agent Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Listed Properties -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Listed Properties</h2>
                <p class="text-4xl font-bold">{{ $listedPropertiesCount }}</p>
            </div>

            <!-- Inquiries Received -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Inquiries Received</h2>
                <p class="text-4xl font-bold">{{ $inquiriesCount }}</p>
            </div>

            <!-- Transactions -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Transactions</h2>
                <p class="text-4xl font-bold">{{ $transactionsCount }}</p>
            </div>
        </div>
    </div>
</x-agent-layout>