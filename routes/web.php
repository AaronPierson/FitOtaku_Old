<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use App\Models\User;


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

Route::middleware('auth')->group(function(){
    Route::post('/logout', function(){
        // return Inertia::render('About');
        dd('loging the user out');
    });
    
    Route::get('players', [UsersController::class, 'index']);
    Route::get('players/{id}', [UsersController::class, 'show']);
});

Route::get('/', function() {
    return Inertia::render('Home');
});

Route::get('/users/create', function(){
    return Inertia::render('Users/Create');

});


Route::post('/users', function(Request $request){
    //validate the info
    $validated = $request->validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',

    ]);
    //create the user
    User::create($validated);
    //redirect
    return redirect('/');
});

Route::get('/About', function() {
    sleep(2);
    return Inertia::render('About');
});

Route::get('login', [LoginController::class, 'create'])->name('login');




