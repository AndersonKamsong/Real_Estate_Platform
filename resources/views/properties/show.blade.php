@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h1 class="text-3xl font-bold mb-4">{{ $property->title }}</h1>
            <p class="text-gray-600 mb-4">{{ $property->location }}</p>
            <p class="text-blue-500 font-bold text-2xl mb-4">${{ number_format($property->price, 2) }}</p>
            <p class="text-gray-700 mb-4">{{ $property->description }}</p>
            <div class="mb-4">
                <span class="font-bold">Bedrooms:</span> {{ $property->bedrooms }}
            </div>
            <div class="mb-4">
                <span class="font-bold">Bathrooms:</span> {{ $property->bathrooms }}
            </div>
            <div class="mb-4">
                <span class="font-bold">Sqft:</span> {{ $property->sqft }}
            </div>
        </div>
        <div>
            <div class="grid grid-cols-2 gap-4 mb-6">
                @if($property->images->isNotEmpty())
                @foreach($property->images as $image)
                <img src="{{ asset($image->image_path) }}" alt="Property Image" class="w-full h-48 object-cover rounded">
                @endforeach
                @else
                <div class="col-span-2 bg-gray-200 p-6 text-center rounded">
                    <span class="text-gray-500">No Images Available</span>
                </div>
                @endif
            </div>
            <form action="{{ route('inquiries.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
                @csrf
                <input type="hidden" name="property_id" value="{{ $property->id }}">
                <div class="mb-4">
                    <input type="text" name="name" placeholder="Your Name" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Your Email" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <textarea name="message" placeholder="Your Message" class="w-full p-2 border rounded" rows="4" required></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Send Inquiry</button>
            </form>
        </div>
    </div>
</div>
@endsection