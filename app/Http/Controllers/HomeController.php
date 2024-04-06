<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Hashtag;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user.info')->orderBy('created_at', 'desc');

        if (request()->has('search')) {
            $posts = $posts->where('content', 'like', '%' . request()->get('search', '') . '%');
        }

        $posts = $posts->get();
        $trendingHashtags = Hashtag::orderBy('usage_count', 'desc')->take(5)->get();

        return view('home', compact('posts', 'trendingHashtags'));
    }
}
