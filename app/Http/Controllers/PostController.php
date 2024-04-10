<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store()
    {

        $validated = request()->validate([
            'content' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $validated['user_id'] = auth()->id();

        if (request()->has('photo')) {
            $imagePath = request()->file('photo')->store('profile', 'public');
            $validated['photo'] = $imagePath;
        }

        Post::create($validated);

        preg_match_all('/#(\w+)/', request()->content, $matches);
        $hashtags = $matches[1]; // Extracted hashtags

        // Increment hashtag usage count
        foreach ($hashtags as $tag) {
            $hashtag = Hashtag::firstOrCreate([
                'name' => $tag
            ]);
            $hashtag->increment('usage_count');
        }


        return redirect()->back()->with('success', 'Post Sucess!');
    }

    public function show(Post $post)
    {
        $showing = true;
        $trendingHashtags = Hashtag::orderBy('usage_count', 'desc')->take(5)->get();
        return view('posts.show', compact('post', 'showing', 'trendingHashtags'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(401);
        }

        $editing = true;
        $trendingHashtags = Hashtag::orderBy('usage_count', 'desc')->take(5)->get();
        return view('posts.show', compact('post', 'editing', 'trendingHashtags'));
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

        preg_match_all('/#(\w+)/', request()->content, $matches);
        $hashtags = $matches[1]; // Extracted hashtags

        // Increment hashtag usage count
        foreach ($hashtags as $tag) {
            $hashtag = Hashtag::firstOrCreate([
                'name' => $tag
            ]);
            $hashtag->increment('usage_count');
        }

        return redirect()->route('post.show', $post->id);
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        if ($post->user_id !== auth()->id()) {
            abort(401);
        }

        Post::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('home');
    }
}
