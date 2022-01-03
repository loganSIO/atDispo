<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalenderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/calendrier', [App\Http\Controllers\EventController::class, 'index']);
Route::get('/calendrier/afficher', [App\Http\Controllers\EventController::class, 'show']);

Route::post('/calendrier/ajouter', [App\Http\Controllers\EventController::class, 'store']);

Route::post('/calendrier/modifier/{id}', [App\Http\Controllers\EventController::class, 'edit']);

Route::post('/calendrier/actualiser/{event}', [App\Http\Controllers\EventController::class, 'update']);

Route::post('/calendrier/supprimer/{id}', [App\Http\Controllers\EventController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
