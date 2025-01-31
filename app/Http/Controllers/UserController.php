<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Suspend a user
    public function suspend(User $user)
    {
        $user->update(['status' => 'suspended']);
        return redirect()->back()->with('success', 'User suspended successfully.');
    }

    // Activate a user
    public function activate(User $user)
    {
        $user->update(['status' => 'active']);
        return redirect()->back()->with('success', 'User activated successfully.');
    }
}
