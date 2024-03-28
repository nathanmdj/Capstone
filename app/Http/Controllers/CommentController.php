<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->back();
    }

    public function show(Post $post)
    {
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Comment $comment)
    {
        $post = new Post();
        $post->id = $comment->post_id;
        $id = $comment->id;
        Comment::where('id', $id)->firstOrFail()->delete();

        return redirect()->back();
    }
}
