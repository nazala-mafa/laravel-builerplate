<?php

namespace App\Services;

use App\Services\SidemenuServiceInterface;

class SidemenuService implements SidemenuServiceInterface
{
    public function getMenus(): array
    {
        return [];
    }
}