<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ViewHistoryController;
use App\Http\Controllers\SavedSearchController;

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


Route::middleware('auth')->group(function () {
    // Rent/Buy Routes
    Route::post('/properties/{property}/rent', [PropertyController::class, 'rent'])->name('properties.rent');
    Route::post('/properties/{property}/buy', [PropertyController::class, 'buy'])->name('properties.buy');
    // Buyer Dashboard
    Route::get('/buyer/dashboard', [BuyerController::class, 'dashboard'])->name('buyer.dashboard');
    // Favorites
    Route::get('/buyer/favorites', [BuyerController::class, 'favorites'])->name('buyer.favorites');
    // View History
    Route::get('/buyer/view-history', [BuyerController::class, 'viewHistory'])->name('buyer.view-history');
    // Inquiry
    Route::get('/properties/{property}/inquiry', [BuyerController::class, 'inquiry'])->name('buyer.inquiry');
    // Transaction Routes
    Route::get('/buyer/transactions', [TransactionController::class, 'index'])->name('buyer.transactions');
    Route::post('/inquiries', [BuyerController::class, 'storeInquiry'])->name('inquiries.store');
    // Favorite Routes
    Route::post('/favorites/add/{property}', [FavoriteController::class, 'add'])->name('favorites.add');
    Route::delete('/favorites/remove/{property}', [FavoriteController::class, 'remove'])->name('favorites.remove');
    // View History Routes
    Route::get('/buyer/view-history', [ViewHistoryController::class, 'index'])->name('buyer.view-history');
    // Saved Search Routes
    Route::get('/buyer/saved-searches', [SavedSearchController::class, 'index'])->name('buyer.saved-searches');
    Route::post('/saved-searches', [SavedSearchController::class, 'store'])->name('saved-searches.store');
    Route::delete('/saved-searches/{savedSearch}', [SavedSearchController::class, 'destroy'])->name('saved-searches.destroy');
});





require __DIR__ . '/auth.php';
