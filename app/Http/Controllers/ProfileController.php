<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function show(User $profile)
    {
        $posts = Post::with('user')->where('user_id', $profile->id)->orderBy('created_at', 'desc')->get();
        $user = $profile;
        return view('profile.show', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $profile)
    {
        $posts = Post::with('user')->where('user_id', $profile->id)->get();
        $user = $profile;
        $editing = true;
        return view('profile.show', compact('user', 'editing', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $profile)
    {
        $user = $profile;

        $validated = request()->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'bio' => '',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'location' => '',
            'portfolio_url' => '',
        ]);

        if (request()->has('photo')) {
            $imagePath = request()->file('photo')->store('profile', 'public');
            $validated['photo'] = $imagePath;

            Storage::disk('public')->delete($user->info->photo ?? '');
        }
        if (request()->has('cover')) {
            $imagePath = request()->file('cover')->store('profile', 'public');
            $validated['cover'] = $imagePath;

            Storage::disk('public')->delete($user->info->cover ?? '');
        }
        $user->info->update($validated);

        $posts = Post::with('user')->where('user_id', $profile->id)->get();
        return view('profile.show', compact('user', 'posts'));
    }
}
