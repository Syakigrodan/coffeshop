<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityHistory;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth()->user()->position_id == 1) {
                $request->session()->regenerate();
                $user = Auth::user();

                $activity = [
                    'fullname' => $user->fullname,
                    'position' => optional($user->position)->position_name,
                    'action' => 'Login',
                    'description' => 'Login Successfully',
                ];

                ActivityHistory::create($activity);
                return redirect()->intended('/dashboard/manager')->with('toastr-success', 'Login Successfully');
            } elseif (Auth()->user()->position_id == 2) {
                $request->session()->regenerate();
                $user = Auth::user();

                $activity = [
                    'fullname' => $user->fullname,
                    'position' => optional($user->position)->position_name,
                    'action' => 'Login',
                    'description' => 'Login Successfully',
                ];

                ActivityHistory::create($activity);
                return redirect()->intended('/dashboard/admin')->with('toastr-success', 'Login Successfully');
            } elseif (Auth()->user()->position_id == 3) {
                $request->session()->regenerate();
                $user = Auth::user();

                $activity = [
                    'fullname' => $user->fullname,
                    'position' => optional($user->position)->position_name,
                    'action' => 'Login',
                    'description' => 'Login Successfully',
                ];

                ActivityHistory::create($activity);
                return redirect()->intended('/dashboard/cashier')->with('toastr-success', 'Login Successfully');
            }
        }
        return redirect()
            ->back()
            ->with('toastr-error', 'Incorrect Username or Password');
    }
}
