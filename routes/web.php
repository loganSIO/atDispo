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

Route::get('/home', function () {
    return view('template');
});

Route::get('/', function () {
    return view('pages/form');
});

Route::get('calendrier', [FullCalenderController::class, 'index']);
Route::post('calendrier/action', [FullCalenderController::class, 'action']);
