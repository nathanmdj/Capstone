<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/post', [PostController::class, 'store'])->name('post.create');

Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('/login', [LoginController::class, 'login']);
