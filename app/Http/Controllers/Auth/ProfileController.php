<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        config()->set('adminlte.title', 'Profile Edit');

        return view('auth/profile');
    }

    public function update_information(Request $request)
    {
        $request->validate([
            'email' => ['required', 'unique:users,email,' . $request->input('email')],
            'username' => ['required'],
        ]);

        $user = $request->user();
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $success = $user->save();

        if ($success) {
            return redirect()->back()->with('success', __('User information updated successfully.'));
        } else {
            return redirect()->back()->with('success', __('User information update failed.'));
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed']
        ]);

        $user = $request->user();
        $user->password = $request->input('password');
        $success = $user->save();

        if ($success) {
            return redirect()->back()->with('success', __('User password updated successfully.'));
        } else {
            return redirect()->back()->with('error', __('User password update failed.'));
        }
    }
}
