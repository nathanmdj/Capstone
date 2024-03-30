<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function show()
    {

        $resources = Resource::orderBy('category', 'asc')->get();
        $filter = Resource::orderBy('name', 'asc')->get();
        return view('resources', compact('resources', 'filter'));
    }

    public function filter($category)
    {

        $resources = Resource::orderBy('category', 'asc')->get();
        $filter = Resource::where('category', $category)->orderBy('name', 'asc')->get();
        return view('resources', compact('resources', 'filter'));
    }
}
