<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function show()
    {
        $bookmarks = Post::whereHas('bookmarks', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
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
