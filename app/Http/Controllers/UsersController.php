<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    // public function index() {   
    //     return Inertia::render('Dashboard', [
    //         'users' => User::all()->map(fn($user) => [
    //             'name' => $user->name,
    //         ])
    //     ]);
    // }

    public function show()
    {
        $id = Auth::id(); 
        if($id == null) {
            return redirect('users/create');
        }

        // $user_id = Auth::id();
        // $workouts = Workout::whereHas('exercises', function ($query) use ($user_id) {
        //     $query->where('user_id', $user_id);
        // })->get();
//         $workout = Workout::find(1);
// foreach ($workout->exercises as $exercise) {
//     $reps = $exercise->pivot->reps;
//     $sets = $exercise->pivot->sets;
//     // Use the reps and sets information as needed
//}
        $user = User::find($id);
        return Inertia::render('Users/Show', [
            'User' => $user,
            'authenticated' => true
        ]);
    }

    public function create()
    {
            //check if user is logged in
            if (Auth::check()) {
                return redirect('users/show');
            }
            //login page
        return Inertia::render('Users/Create');
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',

        ]);
            //create the user
        User::create($validated);
            //redirect
        return redirect('/');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return Inertia::render('Users/Edit', [
            'User' => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();
        return redirect('/users')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'User deleted!');
    }


// In your controller or somewhere else where you're creating the relationship
// $workout = Workout::find(1);
// $exercise = Exercise::find(2);
// $user_id = Auth::id();
// $workout->exercises()->attach($exercise->id, ['user_id' => $user_id]);

// $workout = Workout::find(1);
// $exercise = Exercise::find(2);
// $user_id = Auth::id();
// $reps = 10;
// $sets = 3;
// $workout->exercises()->attach($exercise->id, ['user_id' => $user_id, 'reps' => $reps, 'sets' => $sets]);

}
