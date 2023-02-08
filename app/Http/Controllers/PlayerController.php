<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    //show player
    public function show()
    {

        $id = Auth::id(); 
        if($id == null) {
            return redirect('users/create');
        }

        $player = Player::find($id);
        return Inertia::render('Players/p1', [
            'player' => $player,
        ]);
    }
}
