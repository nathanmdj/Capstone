<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/post', [PostController::class, 'store'])->name('post.create');

Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');

Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('/login', [LoginController::class, 'login']);

Route::get('/signup', [SignupController::class, 'signup']);
