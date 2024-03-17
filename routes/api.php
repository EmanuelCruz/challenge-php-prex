<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GifController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware('auth:api')->group(function () {
    Route::get('gifs', [GifController::class, 'searchGifs'])->name('gifs.searchGifs');
    Route::get('gifs/{id}', [GifController::class, 'searchGifById'])->name('gifs.searchGifById');
    Route::post('gifs/favorite', [FavoriteController::class, 'saveFavorite'])->name('gifs.saveFavorite');
});
