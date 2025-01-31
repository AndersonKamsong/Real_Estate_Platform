<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // Store a new image
    public function store(Request $request, Property $property)
    {
        $request->validate(['image' => 'required|image']);

        $imagePath = $request->file('image')->store('property_images', 'public');

        $property->images()->create(['image_path' => $imagePath]);

        return redirect()->route('properties.show', $property->id)->with('success', 'Image uploaded successfully.');
    }

    // Delete an image
    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
