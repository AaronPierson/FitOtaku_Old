<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;


class LoginController extends Controller
{
    //
    public function create(){
        //check if user is logged in
        if (Auth::check()) {
            return redirect('users/show');
        }
        //login page
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->validate([
            'remember' => ['boolean'],
        ]);
        // dd($remember);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended('users/show');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->intended('success', 'You are logged out');
    }
}
