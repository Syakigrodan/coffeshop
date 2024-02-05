<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ActivityHistory;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index', [
            'title' => 'Dashboard Admin',
            'users' => User::all(),
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $data = [
            'time' => now()->toDateTimeString(),
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Logout',
            'description' => 'Logout Successfully',
        ];

        ActivityHistory::create($data);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('toastr-success', 'You have successfully logged out.');
    }

    public function activity()
    {
        return view('dashboard.admin.activityHistory', [
            'title' => 'Activity History',
            'activityHistories' => ActivityHistory::latest()->paginate(15),
        ]);
    }
}
