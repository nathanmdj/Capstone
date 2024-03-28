<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function resources()
    {

        $resources = Resource::orderBy('category', 'asc');

        return view('resources', [
            'resources' => $resources->get()
        ]);
    }
}
