<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(
        private Role $role,
    ) {}
    
    public function index(UserDataTable $userDataTable)
    {
        config()->set('adminlte.plugins.Datatables.active', true);
        config()->set('adminlte.plugins.Sweetalert2.active', true);

        $roles = $this->role->get(['name', 'id']);

        return $userDataTable->render('admin.user.index', compact('roles'));
    }

    public function edit(User $user)
    {

    }

    public function update(Request $request, User $user)
    {
        
    }

    public function show(User $user)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function destroy(User $user)
    {
        
    }
}
