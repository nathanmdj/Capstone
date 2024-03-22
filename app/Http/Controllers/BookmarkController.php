<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function bookmarks()
    {
        return view('bookmarks');
    }
}
