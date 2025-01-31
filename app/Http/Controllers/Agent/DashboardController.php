<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $listedPropertiesCount = Auth::user()->properties()->count();
        $inquiriesCount = Auth::user()->inquiries()->count();
        $transactionsCount = Auth::user()->transactions()->count();

        return view('agent.dashboard', compact('listedPropertiesCount', 'inquiriesCount', 'transactionsCount'));
    }
}
