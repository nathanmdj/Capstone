<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function show(Post $post)
    {

        $bookmarks = Post::select('posts.*') // Select all columns from the posts table
            ->join('bookmarks', 'posts.id', '=', 'bookmarks.post_id')
            ->where('bookmarks.user_id', Auth::id())
            ->orderBy('bookmarks.created_at', 'desc')
            ->get();
        return view('bookmarks', compact('bookmarks'));
    }

    public function store(Post $post)
    {
        $post->bookmarks()->attach(auth()->id());
        return response()->json(['marked' => true]);
    }

    public function destroy(Post $post)
    {
        $post->bookmarks()->detach(auth()->id());
        return response()->json(['marked' => false]);
    }
}
