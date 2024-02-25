<?php
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['web', 'auth:admin']
], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group([
        'middleware' => ['guest'],
    ], function() {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->withoutMiddleware(['auth:admin']);
        Route::post('/login', [LoginController::class, 'login'])->withoutMiddleware(['auth:admin']);
    });
});