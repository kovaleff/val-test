<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::post('/new-game', [\App\Http\Controllers\GameController::class,'newGame'])->name('new_game');
Route::get('/game', [\App\Http\Controllers\GameController::class,'game'])->name('game');
Route::get('/state', [\App\Http\Controllers\GameController::class,'getState'])->name('getState');
Route::post('/state', [\App\Http\Controllers\GameController::class,'setState'])->name('setState');
Route::post('/finish', [\App\Http\Controllers\GameController::class,'finish'])->name('finish');
