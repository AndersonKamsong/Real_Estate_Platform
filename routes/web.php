<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;



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

use App\Http\Controllers\BuyerController;

Route::middleware('auth')->group(function () {
    Route::get('/buyer/dashboard', [BuyerController::class, 'dashboard'])->name('buyer.dashboard');
    Route::get('/buyer/favorites', [BuyerController::class, 'favorites'])->name('buyer.favorites');
    Route::get('/buyer/view-history', [BuyerController::class, 'viewHistory'])->name('buyer.view-history');
    Route::get('/buyer/saved-searches', [BuyerController::class, 'savedSearches'])->name('buyer.saved-searches');
});

require __DIR__.'/auth.php';
