@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-6">Contact Us</h1>
    <form action="{{ route('contact.submit') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        <div class="mb-4">
            <input type="text" name="name" placeholder="Your Name" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <input type="email" name="email" placeholder="Your Email" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <textarea name="message" placeholder="Your Message" class="w-full p-2 border rounded" rows="4" required></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Send Message</button>
    </form>
</div>
@endsection