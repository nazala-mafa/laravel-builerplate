<?php

namespace App\Services\Admin;

use App\Services\SidemenuServiceInterface;

class SidemenuService implements SidemenuServiceInterface
{
    public function getMenus(): array
    {
        return [
            [
                'type' => 'navbar-search',
                'text' => 'search',
                'topnav_right' => true,
            ],
            [
                'type' => 'fullscreen-widget',
                'topnav_right' => true,
            ],
    
            // Sidebar items:
            [
                'type' => 'sidebar-menu-search',
                'text' => 'search',
            ],
            [
                'text' => 'Dashboard',
                'url' => route('admin.home'),
                'icon' => 'fas fa-tachometer-alt'
            ],
            [
                'text' => 'Users',
                'url' => route('admin.user.index'),
                'icon' => 'fas fa-users'
            ],
            [
                'text' => 'Profile Edit',
                'url' => route('admin.profile'),
                'icon' => 'fas fa-user-edit',
            ],
        ];
    }
}