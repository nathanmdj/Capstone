<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/messages', [MessageController::class, 'show'])->name('messages.show')->middleware('auth');


Route::get('/messages/user/search', [MessageController::class, 'search'])->middleware('auth');


Route::post('/messages/newThread/{user}', [MessageController::class, 'newThread'])->name('thread.create')->middleware('auth');

Route::post('/messages/broadcast', [MessageController::class, 'broadcast'])->name('messages.broadcast')->middleware('auth');
Route::post('/messages/receive', [MessageController::class, 'receive'])->name('messages.receive')->middleware('auth');
