<?php

namespace App\Providers;

use App\Services\SidemenuService;
use App\Services\SidemenuServiceInterface;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SidemenuServiceInterface::class, SidemenuService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->addGuard();
        $this->loadRoutesFrom(base_path('routes/admin.php'));
    }

    private function addGuard()
    {
        config()->set('auth.guards.admin', [
            'driver' => 'session',
            'provider' => 'users',
        ]);
    }
}
