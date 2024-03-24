<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;

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


Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/messages', [MessageController::class, 'messages'])->name('messages')->middleware('auth');

Route::get('/bookmarks', [BookmarkController::class, 'bookmarks'])->name('bookmarks')->middleware('auth');

Route::get('/resources', [ResourceController::class, 'resources'])->name('resources')->middleware('auth');
