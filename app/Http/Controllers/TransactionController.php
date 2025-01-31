<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Property;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Record a transaction
    public function store(Request $request, Property $property)
    {
        $request->validate(['type' => 'required|in:sold,rented']);

        $property->update(['status' => $request->type]);

        $request->user()->transactions()->create([
            'property_id' => $property->id,
            'type' => $request->type,
            'transaction_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Transaction recorded successfully.');
    }
}
