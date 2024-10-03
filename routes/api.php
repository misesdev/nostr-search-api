<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\SearchController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\RelaysController;

# User manage and det data
Route::get('/user/{pubkey}', [UserController::class, 'index']);

Route::get('/user/friends/{pubkey}', [UserController::class, 'friends']);

Route::post('/user/add', [UserController::class, 'add']);

Route::post('/user/friends/add', [UserController::class, 'add_friends']);

# Search options
Route::post('/search', [SearchController::class, 'index']);

Route::post('/search/friends', [SearchController::class, 'friends']);

# Relays manage and search
Route::post('/relays/search', [RelaysController::class, 'search']);

Route::post('/relays/add', [RelaysController::class, 'add']);



