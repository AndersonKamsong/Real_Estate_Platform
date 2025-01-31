<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Auth::user()->transactions()->with('property')->get();
        return view('agent.transactions', compact('transactions'));
    }
}
