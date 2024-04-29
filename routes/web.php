<?php

use Illuminate\Support\Facades\Route;

/* WEB ROUTES */

Route::get('/', function () {
    return 'welcome';
});
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'chat']);

/* API ROUTES */

Route::get('/api/chat/user/online', [App\Http\Controllers\UserController::class, 'online']);
