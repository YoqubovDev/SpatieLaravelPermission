<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);
        Permission::create($validatedData);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission created successfully!');
    }

    public function edit($id)
    {
        $permissions =Permission::all();
        return view('admin.permissions.edit', compact('permissions'));
    }

    public function update(Request $request, $id)
    {
        // Handle the request to update data
        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully!');
    }

    public function destroy($id)
    {
        // Handle the request to delete data
        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully!');
    }
}
