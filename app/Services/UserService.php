<?php

namespace App\Services;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserService {
    public function update(Request $request)
    {
        $user = user();
        unset($user->guard);

        $data = $request->only(['name', 'email', 'password']);
        if (isset($data['password'])) {
            $data['password'] = \Hash::make($data['password']);
        }
        
        return $user->update($data);
    }

    public static function registerUpdateRoutes(?string $guard = null)
    {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::patch('/profile/biodata', [ProfileController::class, 'update_biodata'])->name('profile.update.biodata');
        Route::patch('/profile/password', [ProfileController::class, 'update_password'])->name('profile.update.password');
    }
}