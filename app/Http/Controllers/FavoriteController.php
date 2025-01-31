<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // Add a property to favorites
    public function add(Property $property)
    {
        // Check if the property is already favorited
        if ($property->isFavoritedBy(Auth::user())) {
            return redirect()->back()->with('error', 'This property is already in your favorites.');
        }

        // Add the property to favorites
        Favorite::create([
            'user_id' => Auth::id(),
            'property_id' => $property->id,
        ]);

        return redirect()->back()->with('success', 'Property added to favorites!');
    }

    // Remove a property from favorites
    public function remove(Property $property)
    {
        // Find the favorite record
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('property_id', $property->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return redirect()->back()->with('success', 'Property removed from favorites!');
        }

        return redirect()->back()->with('error', 'This property is not in your favorites.');
    }
}
