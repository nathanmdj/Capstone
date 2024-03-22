<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourcesController;

use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/post', [PostController::class, 'store'])->name('post.create')->middleware('auth');

Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show')->middleware('auth');

Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');

Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/login', [LoginController::class, 'login']);

Route::post('/post/{post}/comments', [CommentController::class, 'store'])->name('post.comments.store');

Route::get('/post/{post}/comments', [CommentController::class, 'show'])->name('post.comments.show');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');





Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/messages', [MessageController::class, 'messages'])->name('messages')->middleware('auth');

Route::get('/bookmarks', [BookmarkController::class, 'bookmarks'])->name('bookmarks')->middleware('auth');

Route::get('/resources', [ResourcesController::class, 'resources'])->name('resources')->middleware('auth');
