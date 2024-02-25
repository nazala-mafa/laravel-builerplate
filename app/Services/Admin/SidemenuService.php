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
                'text' => 'blog',
                'url' => 'admin/blog',
                'can' => 'manage-blog',
            ],
            [
                'text' => 'pages',
                'url' => 'admin/pages',
                'icon' => 'far fa-fw fa-file',
                'label' => 4,
                'label_color' => 'success',
            ],
            ['header' => 'account_settings'],
        ];
    }
}