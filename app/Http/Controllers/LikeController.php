<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $post->likes()->attach(auth()->id());
        return response()->json(['liked' => true]);
    }

    public function unlike(Post $post)
    {
        $post->likes()->detach(auth()->id());
        return response()->json(['liked' => false]);
    }
}
