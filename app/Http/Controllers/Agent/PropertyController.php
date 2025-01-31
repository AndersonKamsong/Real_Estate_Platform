<?php

namespace App\Http\Controllers\Agent;

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Auth::user()->properties()->with('images')->get();
        return view('agent.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('agent.properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|in:rent,buy',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'sqft' => 'required|integer',
            'location' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property = Auth::user()->properties()->create($request->only([
            'title',
            'description',
            'price',
            'type',
            'bedrooms',
            'bathrooms',
            'sqft',
            'location'
        ]));


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('property_images', 'public');
                $property->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('agent.properties.index')->with('success', 'Property added successfully!');
    }

    public function edit(Property $property)
    {
        return view('agent.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|in:rent,buy',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'sqft' => 'required|integer',
            'location' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property->update($request->only([
            'title',
            'description',
            'price',
            'type',
            'bedrooms',
            'bathrooms',
            'sqft',
            'location'
        ]));

        // Upload new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('property_images', 'public');
                $property->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('agent.properties.index')->with('success', 'Property updated successfully!');
    }

    public function destroy(Property $property)
    {
        if ($property->status !== 'available') {
            return redirect()->route('agent.properties.index')->with('error', 'Only available properties can be deleted.');
        }

        $property->delete();
        return redirect()->route('agent.properties.index')->with('success', 'Property deleted successfully!');
    }
}
