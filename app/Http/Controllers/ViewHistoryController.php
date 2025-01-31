<?php

namespace App\Http\Controllers;

use App\Models\ViewHistory;
use App\Models\Property;
use Illuminate\Http\Request;

class ViewHistoryController extends Controller
{
    // Track a property view
    public function store(Request $request, Property $property)
    {
        $request->user()->viewHistory()->create(['property_id' => $property->id]);
        return redirect()->back();
    }
}
