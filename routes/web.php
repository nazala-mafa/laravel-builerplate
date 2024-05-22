<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'profile',
    'as' => 'profile.'
], function() {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::post('information', [ProfileController::class, 'update_information'])->name('information.update');
    Route::post('password', [ProfileController::class, 'update_password'])->name('password.update');
});

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// test
Route::get('form', fn() => view('form'))->name('test.form');
Route::post('form', function() {
    request()->validate([
        'basic' => ['required', 'string'],
        'email' => ['required', 'string'],
        'password' => ['required', 'string', 'confirmed'],
    ]);
})->name('test.form.save');

// admin
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function() {
    Route::get('user/select2', [UserController::class, 'select2_handler'])->name('user.select2');
});