<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['prefix' => 'post', 'as' => 'post.', 'middleware' => 'auth'], function () {
    Route::post('', [PostController::class, 'store'])->name('create');


    Route::get('/{post}', [PostController::class, 'show'])->name('show');

    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');

    Route::put('/{post}', [PostController::class, 'update'])->name('update');

    Route::delete('/{id}', [PostController::class, 'destroy'])->name('destroy');

    Route::post('/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/{post}/comments', [CommentController::class, 'show'])->name('post.comments.show');

    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::resource('profile', ProfileController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->name('user.follow')->middleware('auth');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('user.unfollow')->middleware('auth');

Route::post('like/{post}', [LikeController::class, 'like'])->name('post.like')->middleware('auth');

Route::delete('like/{post}', [LikeController::class, 'unlike'])->name('post.unlike')->middleware('auth');

Route::post('likeComment/{comment}', [LikeController::class, 'likeComment'])->name('comment.like')->middleware('auth');

Route::delete('likeComment/{comment}', [LikeController::class, 'unlikeComment'])->name('comment.unlike')->middleware('auth');

Route::get('bookmarks', [BookmarkController::class, 'show'])->name('bookmarks.show')->middleware('auth');

Route::post('bookmarks/{post}', [BookmarkController::class, 'store'])->name('bookmarks.store')->middleware('auth');

Route::delete('bookmarks/{post}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy')->middleware('auth');


Route::get('/messages', [MessageController::class, 'messages'])->name('messages')->middleware('auth');
Route::get('/resources', [ResourceController::class, 'show'])->name('resources')->middleware('auth');

Route::get('/resources/{category}', [ResourceController::class, 'filter'])->name('resources.filter')->middleware('auth');
