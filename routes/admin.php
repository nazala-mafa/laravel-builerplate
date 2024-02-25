<?php
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Services\UserService;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['web', 'auth:admin', 'role:admin']
], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('/user', UserController::class)->names('user');

    UserService::registerUpdateRoutes();
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['web', 'guest'],
], function() {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
