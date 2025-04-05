<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        // Handle the request to store data
        // For example, you can save data to the database here
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully!');
    }

    public function edit($id)
    {
        return view('admin.roles.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Handle the request to update data
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully!');
    }

    public function destroy($id)
    {
        // Handle the request to delete data
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully!');
    }
}
