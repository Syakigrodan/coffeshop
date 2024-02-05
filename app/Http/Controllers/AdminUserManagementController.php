<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\ActivityHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.userManagement.index', [
            'title' => 'User Management',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.userManagement.create', [
            'title' => 'Create User',
            'positions' => Position::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users',
            'position_id' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        $user = Auth::user();

        $activity = [
            'time' => now()->toDateTimeString(),
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Create User',
            'description' => 'Membuat Data Pengguna telah Berhasil',
        ];

        ActivityHistory::create($activity);

        return redirect('/dashboard/admin')->with('success', 'Membuat Data Pengguna telah Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $userManagement)
    {
        return view('dashboard.admin.userManagement.edit', [
            'title' => 'Edit User',
            'user' => $userManagement,
            'position' => Position::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $userManagement)
    {
        $rules = [
            'fullname' => 'required',
            'position_id' => 'required',
        ];

        if ($request->username != $userManagement->username) {
            $rules['username'] = 'required|unique:users';
        }

        if ($request->has('password') && !empty($request->password)) {
            $rules['password'] = 'required|confirmed|min:8';
        }
        $data = $request->validate($rules);

        if ($request->has('password') && !empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $userManagement->update($data);

        $user = Auth::user();

        $activity = [
            'time' => now()->toDateTimeString(),
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Update Data User',
            'description' => 'Pembaruan Data Pengguna telah Berhasil',
        ];

        ActivityHistory::create($activity);

        return redirect('/dashboard/admin')->with('success', 'Pembaruan Data Pengguna telah Berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $userManagement)
    {
        User::destroy($userManagement->id);

        $user = Auth::user();

        $activity = [
            'time' => now()->toDateTimeString(),
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Delete Data User',
            'description' => 'Hapus Data Pengguna telah Berhasil',
        ];

        ActivityHistory::create($activity);

        return redirect('/dashboard/admin')->with('success', 'Hapus Data Pengguna telah Berhasil');
    }
}
