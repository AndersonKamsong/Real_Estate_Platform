<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    public function index()
    {
        // Fetch inquiries for the agent's properties
        $inquiries = Auth::user()->inquiries()->with('property', 'user')->get();
        return view('agent.inquiries', compact('inquiries'));
    }
}