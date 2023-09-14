<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\Weight;
use App\Models\Calorie;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\CalorieController;
use App\Http\Controllers\WorkoutController;
use App\Mail\WelcomeMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;

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


// home page
Route::get('/', function() {
    return Inertia::render('Home');
});
// about page
Route::get('/About', function() {
    return Inertia::render('About');
});
//Privacy Policy page
Route::get('/Privacy', function() {
    return Inertia::render('Privacy');
});
// contact page
Route::get('/Contact', function() {
    return Inertia::render('Contact');
});


//signup page
Route::get('/signup', [RegisterController::class, 'signup']);
// create a new user
Route::post('/register', [RegisterController::class, 'create']);

// only authenticated users can access this route
Route::middleware('auth')->group(function(){
    // Shows a list of all users
    // Route::get('users', [UsersController::class, 'index']);
    // Shows a single user profile
    Route::get('p1/show', [UsersController::class, 'show']);
    Route::get('p1/show', [UsersController::class, 'show'])->name('user.show');
    // show user settings
    Route::get('/p1/settings', [UsersController::class, 'edit']);
    //udpate user settings
    Route::post('/p1/update', [UsersController::class, 'update']);
    // delete user
    Route::delete('/p1/delete', [UsersController::class, 'destroy']);
    // send Weight data to database
    Route::post('/weight', [WeightController::class, 'store']);
    // show weight data
    Route::get('/p1/weight/index', [WeightController::class, 'index']);
    //delete weight data
    Route::delete('/p1/weight/{id}/delete', [WeightController::class, 'delete']);
    //edit weight data
    Route::post('/p1/weight/update', [WeightController::class, 'update']);
    // show calorie data
    Route::get('/p1/calories/index', [CalorieController::class, 'index']);
    // delete calorie data
    Route::delete('/p1/calories/{id}/delete', [CalorieController::class, 'delete']);
    //edit calorie data
    Route::post('/p1/calories/update', [CalorieController::class, 'update']);

    Route::get('/p1/workout/index', [WorkoutController::class, 'index']);
    Route::get('/p1/workout/{id}', [WorkoutController::class, 'show']);
    Route::delete('/p1/workout/{id}/delete', [WorkoutController::class, 'deleteWorkout']);
    Route::post('/workout/{workoutId}/exercises', [WorkoutController::class, 'addExercises']);
    Route::get('/p1/exercises/{id}', [WorkoutController::class, 'showExercises']);

});

// login page
Route::get('login', [LoginController::class, 'create'])->name('login');
// login a user
Route::post('login', [LoginController::class, 'store']);
// logout a user
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

//reset password page
Route::get('/reset-password', function () {
    return Inertia::render('Auth/Password/Reset');
})->middleware('guest')->name('password.request');
//send reset password link
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password-update', [ResetPasswordController::class, 'reset']);



//axios Requests
//axios get request to check if user is logged in
Route::get('/api/auth/status', function () {
    // dd(Auth::check());
    return response()->json(['authenticated' => Auth::check()]);
});
//get user calories
Route::get('/api/calories', function () {
    try{
        $id = Auth::id(); 
        $calories = Calorie::where('user_id', $id)
        ->whereBetween('date_consumed', [Carbon::now()->subDays(7), Carbon::now()])
        ->get()
        ->groupBy(function($calorie) {
            $date = new DateTime($calorie->date_consumed);
            return $date->format('Y-m-d');
        });
        // ->select('calories', 'date_consumed' )->latest()->get();

        $grouped_calories = [];
        foreach($calories as $date => $calorie_entries) {
            $total_calories = $calorie_entries->sum('calories');
            $grouped_calories[$date] = $total_calories;
        }
        return response()->json($grouped_calories);

        // return response()->json($calories);
        } catch (Exception $e) {
        echo $e->getMessage(),PHP_EOL;
        //return error msg
        return response()->json(['error' => 'There was an error retrieving your data']);
    }
});
// get user weight
Route::get('/api/weight', function () {
    try{
        $id = Auth::id(); 
        $weight = Weight::where('user_id', $id)
        ->select('weight', 'weigh_in_date')
        ->orderBy('weigh_in_date', 'desc') // add this line
        ->latest()->take(7)->get();
        return response()->json($weight);
        } catch (Exception $e) {
        echo $e->getMessage(),PHP_EOL;
        //return error msg
        return response()->json(['error' => 'There was an error retrieving your data']);
    }
});

// send Calories data to database
Route::post('/calories', [CalorieController::class, 'store']);
// show calories data
Route::get('/calories', [CalorieController::class, 'show']);

//send workout data to database
Route::post('/workout', [WorkoutController::class, 'store']);

Route::get('/email', [EmailsController::class, 'welcome']);

Route::post('/email/contact', [EmailsController::class, 'contact']);
//reset password email
Route::post('/email/reset', [EmailsController::class, 'reset']);

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

