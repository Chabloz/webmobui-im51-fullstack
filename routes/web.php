<?php

use Illuminate\Support\Facades\Route;

/* WEB ROUTES */
Route::get('/', [App\Http\Controllers\ChatController::class, 'login']);
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'chat']);

/* API ROUTES */
Route::get('/api/chat/user/online', [App\Http\Controllers\ApiUserController::class, 'online']);