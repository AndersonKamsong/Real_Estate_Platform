<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // Display the buyer's transactions
    public function index()
    {
        $transactions = Auth::user()->transactions()->with('property')->latest()->get();
        return view('buyer.transactions', compact('transactions'));
    }
}
