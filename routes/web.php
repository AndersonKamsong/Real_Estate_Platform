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

use App\Http\Controllers\Agent\DashboardController;
use App\Http\Controllers\Agent\PropertyController as  AgentPropertyController;
use App\Http\Controllers\Agent\InquiryController;
use App\Http\Controllers\Agent\TransactionController as AgentTransactionController;

// Agent Routes
Route::prefix('agent')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('agent.dashboard');
    // Route::get('/properties', [AgentPropertyController::class, 'index'])->name('agent.properties.index');
    // Route::resource('/properties', AgentPropertyController::class)->except(['show']);

    // List all properties
    Route::get('/properties', [AgentPropertyController::class, 'index'])->name('agent.properties.index');

    // Show form to create a new property
    Route::get('/properties/create', [AgentPropertyController::class, 'create'])->name('agent.properties.create');

    // Store new property
    Route::post('/properties', [AgentPropertyController::class, 'store'])->name('agent.properties.store');

    // Show form to edit a property
    Route::get('/properties/{property}/edit', [AgentPropertyController::class, 'edit'])->name('agent.properties.edit');

    // Update property
    Route::put('/properties/{property}', [AgentPropertyController::class, 'update'])->name('agent.properties.update');

    // Delete property
    Route::delete('/properties/{property}', [AgentPropertyController::class, 'destroy'])->name('agent.properties.destroy');
    Route::get('/inquiries', [InquiryController::class, 'index'])->name('agent.inquiries');
    Route::get('/transactions', [AgentTransactionController::class, 'index'])->name('agent.transactions');
});

// routes/web.php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingsController;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::put('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/properties', [AdminPropertyController::class, 'index'])->name('admin.properties.index');
    // Route::put('/properties/{property}/edit', [AdminPropertyController::class, 'index'])->name('admin.properties.edit');
    // Route::delete('/properties/{property}', [AdminPropertyController::class, 'index'])->name('admin.properties.destroy');
    
    // Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    
    Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('admin.transactions.index');
    // Route::resource('/categories', CategoryController::class)->name('admin.dashboard');
    // Route::resource('/transactions', AdminTransactionController::class)->name('admin.dashboard');
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
});

require __DIR__ . '/auth.php';
