<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Property Listings Page
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::post('/properties', [PropertyController::class, 'index'])->name('properties.search');

// Property Details Page
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

// About Us Page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact Us Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');