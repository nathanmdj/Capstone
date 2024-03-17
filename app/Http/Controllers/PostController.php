<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        request()->validate([
            'posts' => 'required'
        ]);

        $post = Post::create([
            'content' => request()->get('posts', ''),
        ]);

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        Post::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('home');
    }
}
