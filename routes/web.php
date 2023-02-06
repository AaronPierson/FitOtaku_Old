<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



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

// contact page
Route::get('/Contact', function() {
    return Inertia::render('Contact');
});

// submit contact form
Route::post('/Contact', function(Request $request) {
    
    $credentials = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', config('services.sendinblue.key'));
    $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(),$credentials);
    
    //get data from form
    $name = $request->input('name');
    $email = $request->input('email');
    $message = $request->input('message');
    // dd($name, $email, $message);
    //create email
    $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
         'subject' => 'from the PHP SDK!',
         'sender' => ['name' => $name, 'email' => $email],
         'replyTo' => ['name' => 'Sendinblue', 'email' => 'contact@sendinblue.com'],
         'to' => [[ 'name' => 'Max Mustermann', 'email' => 'rpgames2@live.com']],
         'htmlContent' => '<html><body><h1>This is a transactional email {{params.bodyMessage}}</h1></body></html>',
         'params' => ['bodyMessage' => $message]
    ]);
    //send email
    try {
        $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        // dd($result);
    } catch (Exception $e) {
        echo $e->getMessage(),PHP_EOL;
        return redirect('/')->with('error', 'Your message has not been sent');
    }
    return redirect('/')->with('success', 'Your message has been sent');
});

//signup page
Route::get('/users/create', [UsersController::class, 'create']);
// create a new user
Route::post('/users', [UsersController::class, 'store']);

// only authenticated users can access this route
Route::middleware('auth')->group(function(){
    // Shows a list of all users
    Route::get('users', [UsersController::class, 'index']);
    // Shows a single user profile
    Route::get('users/show', [UsersController::class, 'show']);
});

// login page
Route::get('login', [LoginController::class, 'create'])->name('login');
// login a user
Route::post('login', [LoginController::class, 'store']);
// logout a user
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');


Route::get('/api/auth/status', function () {
    // dd(Auth::check());
    return response()->json(['authenticated' => Auth::check()]);
});
