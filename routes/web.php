<?php

use Illuminate\Support\Facades\Route;

/* WEB ROUTES */
Route::get('/', [App\Http\Controllers\UserController::class, 'loginForm']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::get('/eduid', [App\Http\Controllers\UserController::class, 'eduId']);
Route::get('/login-eduid', [App\Http\Controllers\UserController::class, 'loginEduId']);

Route::get('/chat', [App\Http\Controllers\ChatController::class, 'chat']);

/* API ROUTES (example) */
Route::prefix('api')->group(function () {

  Route::get('/user/online', [App\Http\Controllers\ApiUserController::class, 'online']);

});
