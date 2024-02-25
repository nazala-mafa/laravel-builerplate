<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private User $user
    ) {}
    
    public function index()
    {
        $users = $this->user->get();
        return view('admin.user.index', compact('users'));
    }
}
