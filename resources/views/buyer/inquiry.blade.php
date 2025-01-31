<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Inquiry for {{ $property->title }}</h1>

        <form action="{{ route('inquiries.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <input type="hidden" name="property_id" value="{{ $property->id }}">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Your Name</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Your Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700">Message</label>
                <textarea name="message" id="message" class="w-full p-2 border rounded" rows="4" required></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Send Inquiry</button>
        </form>
    </div>
</x-app-layout>