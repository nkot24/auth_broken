<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
