@extends('layouts.app')

@section('content')
<div class="hero bg-cover bg-center" style="background-image: url('{{ asset('images/real.jpeg') }}');">
    <div class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-white mb-4">Find Your Dream Property</h1>
        <form action="{{ route('properties.search') }}" method="GET" class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex flex-wrap -mx-2">
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <input type="text" name="location" placeholder="Location" class="w-full p-2 border rounded">
                </div>
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <select name="type" class="w-full p-2 border rounded">
                        <option value="">Property Type</option>
                        <option value="rent">Rent</option>
                        <option value="buy">Buy</option>
                    </select>
                </div>
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <h2 class="text-2xl font-bold mb-6">Featured Properties</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($featuredProperties as $property)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($property->images->isNotEmpty())
            <img src="{{ asset($property->images->first()->image_path) }}" alt="{{ $property->title }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500">No Image Available</span>
            </div>
            @endif
            <div class="p-4">
                <h3 class="text-xl font-bold">{{ $property->title }}</h3>
                <p class="text-gray-600">{{ $property->location }}</p>
                <p class="text-blue-500 font-bold">${{ number_format($property->price, 2) }}</p>
                <a href="{{ route('properties.show', $property->id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">View Details</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection