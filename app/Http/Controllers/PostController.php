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
            'content' => 'required'
        ]);

        Post::create([
            'content' => $validated['content'],
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('home');
    }

    public function show(Post $post)
    {
        $showing = true;
        return view('posts.show', compact('post', 'showing'));
    }

    public function edit(Post $post)
    {
        $editing = true;
        return view('posts.show', compact('post', 'editing'));
    }

    public function update(Post $post)
    {
        $validated = request()->validate([
            'content' => 'required'
        ]);

        $post->update($validated);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy($id)
    {
        Post::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('home');
    }
}
