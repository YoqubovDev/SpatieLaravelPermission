<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles=Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);
        Role::create($validatedData);
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully!');
    }

    public function edit(Role $role)
    {
        $permissions = \Spatie\Permission\Models\Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,',
        ]);
        $role->update($validatedData);
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully!');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully!');
    }

    public function givePermissions(Request $request, Role $role)
    {
        $request->validate([
            'permission' => 'required|string|exists:permissions,name',
        ]);

        $permission = Permission::where('name', $request->permission)->first();

        if ($permission && !$role->hasPermissionTo($permission)) {
            $role->givePermissionTo($permission);
        }

        return back()->with('success', 'Permission assigned successfully.');
    }
}
