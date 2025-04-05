<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        // Handle the request to store data
        // For example, you can save data to the database here
        return redirect()->route('admin.index')->with('success', 'Data stored successfully!');
    }
}
