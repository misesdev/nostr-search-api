<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\SearchController;
use \App\Http\Controllers\UserController;


Route::get('/user/{pubkey}', [UserController::class, 'index']);

Route::get('/user/friends/{pubkey}', [UserController::class, 'friends']);

Route::post('/search', [SearchController::class, 'index']);

Route::post('/search/friends', [SearchController::class, 'friends']);

Route::post('/search/relays', [SearchController::class, 'relays']);



