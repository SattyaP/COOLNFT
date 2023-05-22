<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Authorizable;
use Session;

class RoleController extends Controller
{
    use Authorizable;

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if( Role::create($request->only('name')) ) {
            Session::flash('success','Role Added');
        }

        return redirect('admin/roles');
    }

    public function update(Request $request, Role $role)
    {
        Session::flash('success', $role->name . ' permissions has been updated.');

        if ($role->name == 'Admin') {
            $role->syncPermissions(Permission::all());

            return redirect('admin/roles');
        }

        $permissions = $request->get('permissions', []);

        $role->syncPermissions($permissions);

        return redirect('admin/roles');
    }

    public function destroy(Role $role)
    {
        //
    }
}