<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateBiodataRequest;
use App\Http\Requests\ProfileUpdatePasswordRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}
    
    public function index()
    {
        return view('profile');
    }

    public function update_biodata(ProfileUpdateBiodataRequest $request)
    {
        if ($this->userService->update($request)) {
            return back()->with('update_biodata.success', 'User Biodata\'s update succeed.');
        }
        
        return back()->with('update_biodata.error', 'User Biodata\'s update failed.');
    }

    public function update_password(ProfileUpdatePasswordRequest $request)
    {
        if ($this->userService->update($request)) {
            return back()->with('update_password.success', 'User Password\'s update succeed.');
        }
        
        return back()->with('update_password.error', 'User Password\'s update failed.');
    }
}
