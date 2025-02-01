<x-admin-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Total Users -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Total Users</h2>
                <p class="text-4xl font-bold">{{ $totalUsers }}</p>
            </div>

            <!-- Total Properties -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Total Properties</h2>
                <p class="text-4xl font-bold">{{ $totalProperties }}</p>
            </div>

            <!-- Total Transactions -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Total Transactions</h2>
                <p class="text-4xl font-bold">{{ $totalTransactions }}</p>
            </div>
        </div>

    </div>
</x-admin-layout>
