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
                'text' => 'pages',
                'url' => 'admin/pages',
                'icon' => 'far fa-fw fa-user-edit',
            ],
            ['header' => 'account_settings'],
        ];
    }
}