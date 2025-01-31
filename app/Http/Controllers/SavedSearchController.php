<?php

namespace App\Http\Controllers;

use App\Models\SavedSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedSearchController extends Controller
{
    // Display the buyer's saved searches
    public function index()
    {
        $savedSearches = Auth::user()->savedSearches;
        return view('buyer.saved-searches', compact('savedSearches'));
    }

    // Save a new search
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'criteria' => 'required|json',
        ]);

        Auth::user()->savedSearches()->create([
            'name' => $request->name,
            'criteria' => $request->criteria,
        ]);

        return redirect()->back()->with('success', 'Search saved successfully!');
    }

    // Delete a saved search
    public function destroy(SavedSearch $savedSearch)
    {
        $savedSearch->delete();
        return redirect()->back()->with('success', 'Search deleted successfully!');
    }
}