<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store()
    {

        $validated = request()->validate([
            'content' => 'required',
        ]);

        $validated['user_id'] = auth()->id();

        Post::create($validated);

        return redirect()->route('home');
    }

    public function show(Post $post)
    {
        $showing = true;
        return view('posts.show', compact('post', 'showing'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(401);
        }

        $editing = true;
        return view('posts.show', compact('post', 'editing'));
    }

    public function update(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(401);
        }

        $validated = request()->validate([
            'content' => 'required'
        ]);

        $post->update($validated);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy($id)
    {
        $post = new Post();
        if ($post->user_id !== auth()->id()) {
            abort(401);
        }

        Post::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('home');
    }
}
