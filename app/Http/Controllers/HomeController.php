<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::with('images')->take(6)->get();
        return view('home', compact('featuredProperties'));
    }
}