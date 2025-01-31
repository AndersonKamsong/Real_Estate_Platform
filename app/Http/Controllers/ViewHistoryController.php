<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewHistoryController extends Controller
{
    // Display the buyer's view history
    public function index()
    {
        $viewHistory = Auth::user()->viewHistory()->with('property')->latest()->get();
        return view('buyer.view-history', compact('viewHistory'));
    }
}