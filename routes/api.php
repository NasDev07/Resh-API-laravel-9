<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommnetController;
use App\Http\Controllers\AuthenticatinController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::post('/login', [AuthenticatinController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('logout', [AuthenticatinController::class, 'logout']);
    Route::get('/me', [AuthenticatinController::class, 'me']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('pemilik-postigan');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('pemilik-postigan');

    Route::post('/comment', [CommnetController::class, 'store']);
    Route::patch('/comment/{id}', [CommnetController::class, 'update'])->middleware('pemilik-comentar');
    Route::delete('/comment/{id}', [CommnetController::class, 'destroy'])->middleware('pemilik-comentar');
});