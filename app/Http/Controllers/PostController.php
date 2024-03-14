<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        $post = Post::create([
            'content' => request()->get('posts', ''),
        ]);

        return redirect()->route('home');
    }
}
