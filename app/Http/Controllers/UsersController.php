<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{


    public function index(){   
        return view('users/dashboard', ['Player' => null]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users/dashboard', [
            'Player' => $user
        ]);
    }
}
