<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('created_at', 'desc');

        if (request()->has('search')) {
            $post = $post->where('content', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('home', [
            'posts' => $post->get()
        ]);
    }
}
