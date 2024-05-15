<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiMessageController;

/* WEB ROUTES */
Route::get('/', [UserController::class, 'loginForm'])->name('login-form');
Route::post('/login', [UserController::class, 'login']);
Route::get('/eduid', [UserController::class, 'eduId']);
Route::get('/login-eduid', [UserController::class, 'loginEduId']);

Route::middleware(['auth'])->group(function () {
  Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
  Route::get('/logout', [UserController::class, 'logout']);
});

/* API ROUTES */
Route::prefix('api')->middleware(['auth'])->group(function () {
  Route::get('/user', [ApiUserController::class, 'online']);
  Route::post('/message', [ApiMessageController::class, 'create']);
  Route::get('/message', [ApiMessageController::class, 'get']);
});