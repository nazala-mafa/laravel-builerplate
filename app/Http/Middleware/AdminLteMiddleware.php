<?php

namespace App\Http\Middleware;

use App\Services\Admin\SidemenuService as AdminSidemenuService;
use App\Services\SidemenuServiceInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminLteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->setSidebarMenus();
        return $next($request);
    }

    private function setSidebarMenus()
    {
        if (auth('admin')->check() && request()->segment(1) === 'admin') {
            app()->singleton(SidemenuServiceInterface::class, AdminSidemenuService::class);
        }

        config()->set('adminlte.menu', app()->get(SidemenuServiceInterface::class)->getMenus());
    }
}
