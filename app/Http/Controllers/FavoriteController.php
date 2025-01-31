<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Property;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // Add a property to favorites
    public function store(Request $request, Property $property)
    {
        $request->user()->favorites()->create(['property_id' => $property->id]);
        return redirect()->back()->with('success', 'Property added to favorites.');
    }

    // Remove a property from favorites
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return redirect()->back()->with('success', 'Property removed from favorites.');
    }
}