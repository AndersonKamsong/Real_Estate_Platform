<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // Handle the contact form submission (e.g., send email, save to database)
        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
}