<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $profile)
    {
        $posts = Post::with('user')->where('user_id', $profile->id)->orderBy('created_at', 'desc')->get();
        $user = $profile;
        $followerCount = $user->followers()->count();
        $followingCount = $user->followings()->count();
        return view('profile.show', compact('user', 'posts', 'followerCount', 'followingCount'));
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
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => '',
            'cover' => '',
            'location' => '',
            'portfolio_url' => '',
        ]);

        if (request()->has('photo')) {
            $imagePath = request()->file('photo')->store('profile', 'public');
            $validated['photo'] = $imagePath;

            Storage::disk('public')->delete($user->info->photo ?? '');
        }
        $user->info->update($validated);

        $posts = Post::with('user')->where('user_id', $profile->id)->get();
        $followerCount = $user->followers()->count();
        $followingCount = $user->followings()->count();
        return view('profile.show', compact('user', 'posts', 'followerCount', 'followingCount'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
