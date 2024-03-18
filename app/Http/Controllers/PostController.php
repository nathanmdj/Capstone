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

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        $editing = true;
        return view('posts.show', compact('post', 'editing'));
    }

    public function update(Post $post)
    {
        $post->content = request()->get('content', '');
        $post->save();

        return redirect()->route('post.show', $post->id);
    }

    public function destroy($id)
    {
        Post::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('home');
    }
}
