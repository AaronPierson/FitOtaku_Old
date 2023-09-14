<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\ContactMailForm;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class EmailsController extends Controller
{
    //testing
    public function welcome(){
        Mail::to('rpgames2@live.com')->send(new WelcomeMail());
        return new WelcomeMail();
    }

    //contact form
    public function contact(Request $request){
        //get data from form
        $userName = $request->input('name');
        $userEmail = $request->input('email');
        $userMessage = $request->input('message');
        //send user confirmation email
        // dd($request->all());
        // dd('testing 1');

        // return new ContactMail($request->all());
        //send email
        try {
            Mail::to($userEmail)->send(new ContactMail($request->all()));
            Mail::to('support@fitotaku.com')->send(new ContactMail($request->all()));
        } catch (Exception $e) {
            echo $e->getMessage(),PHP_EOL;
            return Inertia::render('Contact')->with('error', 'Error: 
            Your message has not been sent');        
        }
        // return redirect('/')->with('success', 'Your message has been sent');
        return Inertia::render('Home')->with('success', 'Your message has been sent');
    }

    //User info update confirmation email
    public function update(Request $request){
        //get data from form
        $userName = $request->input('name');
        $userEmail = $request->input('email');
        $userMessage = $request->input('message');
        //send user confirmation email
        // dd($request->all());
        Mail::to($userEmail)->send(new ContactMail($request->all()));   
    }
    
    //reset password email
    public function reset(Request $request){
        //get data from form
        $userEmail = $request->input('email');
        //send user confirmation email
        // dd($request->all());
        Mail::to($userEmail)->send(new ForgotPassword());   
    }
}
