<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Inertia\Inertia;

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

Route::get('/', function() {
    return Inertia::render('Home');
});

Route::get('/About', function() {
    sleep(2);
    return Inertia::render('About');
});

Route::get('players', [UsersController::class, 'index']);
Route::get('players/{id}', [UsersController::class, 'show']);


