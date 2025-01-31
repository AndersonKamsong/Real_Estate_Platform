<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\ViewHistory;
use App\Models\SavedSearch;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }
        $user = Auth::user();
        $favorites = $user->favorites()->with('property')->get();
        $viewHistory = $user->viewHistory()->with('property')->latest()->take(5)->get();
        $savedSearches = $user->savedSearches ?? collect();

        return view('buyer.dashboard', compact('favorites', 'viewHistory', 'savedSearches'));
    }

    public function favorites()
    {
        $favorites = Auth::user()->favorites()->with('property')->latest()->get();
        return view('buyer.favorites', compact('favorites'));
    }

    public function viewHistory()
    {
        $viewHistory = Auth::user()->viewHistory()->with('property')->latest()->get();
        return view('buyer.view-history', compact('viewHistory'));
    }

    public function savedSearches()
    {
        $savedSearches = Auth::user()->savedSearches ?? collect();
        return view('buyer.saved-searches', compact('savedSearches'));
    }

    public function inquiry(Property $property)
    {
        return view('buyer.inquiry', compact('property'));
    }

    public function storeInquiry(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'property_id' => 'required|exists:properties,id',
        ]);

        // Save the inquiry (you can save it to the database or send an email)
        return redirect()->route('properties.show', $request->property_id)->with('success', 'Your inquiry has been sent!');
    }
}
