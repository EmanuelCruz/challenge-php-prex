<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/gifs', [GifController::class, 'searchByText'])->name('gifs.searchByText');
Route::get('/gifs/{id}', [GifController::class, 'searchByID'])->name('gifs.searchByID');
Route::post('/gifs/favorite', [GifController::class, 'saveFavorite'])->name('gifs.saveFavorite');
