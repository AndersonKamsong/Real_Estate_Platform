<?php

// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Property;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProperties = Property::count();
        $totalTransactions = Transaction::count();

        return view('admin.dashboard', compact('totalUsers', 'totalProperties', 'totalTransactions'));
    }
}