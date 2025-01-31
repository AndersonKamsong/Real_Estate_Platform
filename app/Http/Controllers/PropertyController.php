<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // List all properties
    // public function index()
    // {
    //     $properties = Property::with('categories', 'images')->get();
    //     return view('properties.index', compact('properties'));
    // }
    public function index(Request $request)
    {
        $query = Property::query();

        // Filter by location
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }

        // Filter by property type
        if ($request->has('type')) {
            $query->where('type', $request->input('type'));
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        $properties = $query->with('images')->paginate(9);

        return view('properties.index', compact('properties'));
    }

    // Show the form for creating a new property
    public function create()
    {
        $categories = Category::all();
        return view('properties.create', compact('categories'));
    }

    // Store a new property
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
            'categories' => 'required|array',
        ]);

        $property = Property::create($request->only([
            'title',
            'description',
            'price',
            'type',
            'bedrooms',
            'bathrooms',
            'sqft',
            'location',
            'user_id'
        ]));

        $property->categories()->attach($request->categories);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    // Show a specific property
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    // Show the form for editing a property
    public function edit(Property $property)
    {
        $categories = Category::all();
        return view('properties.edit', compact('property', 'categories'));
    }

    // Update a property
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
            'categories' => 'required|array',
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

        $property->categories()->sync($request->categories);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }
    public function search(Request $request)
    {
        $query = Property::query();

        // Filter by location
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }

        // Filter by property type
        if ($request->has('type')) {
            $query->where('type', $request->input('type'));
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        $properties = $query->with('images')->paginate(9);

        return view('properties.index', compact('properties'));
    }
    // Delete a property
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
