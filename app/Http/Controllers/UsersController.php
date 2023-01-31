<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;


class UsersController extends Controller
{


    public function index(){   
        return Inertia::render('Dashboard', ['Player' => "Aaron"]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return Inertia::render('Dashboard', [
            'Player' => $user
        ]);
    }
}
