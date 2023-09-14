<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\UserAccountUpdated;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Workout;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;


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
            return redirect('p1/create');
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
        //get user
        $user = User::find($id);
        //get user workout
        $workouts = Workout::where('user_id', $id)->take(5)->get();
        return Inertia::render('Users/Show', [
            'User' => $user,
            'Workouts' => $workouts,
            'authenticated' => true
        ]);
    }

    public function edit()
    {
        $id = Auth::id();
        $user = User::find($id);
        return Inertia::render('Users/Edit', [
            'User' => $user
        ]);
    }


    public function update(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        // $user->name = $request->get('name');
        if ($request->filled('name')) {
            $request->validate([
                'name' => 'nullable|string|max:255',
            ]);
            $user->name = $request->name;
        }
        // $user->email = $request->get('email');
        if ($request->filled('email')) {
            $validator = Validator::make($request->all(), [
                'email' => 'email|unique:users,email,'.$user->id.'|max:255',
            ],
            [
                'email.email' => 'Please enter a valid email address',
                'email.unique' => 'This email is already in use',
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user->email = $request->email;
        }
        // $user->password = $request->get('password');
        // if ($request->has('password')) {
        //     $request->validate([
        //         'password' => 'required|min:8',
        //     ]);
        //     $user->password = Hash::make($request->password);
        // }
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required',
            ]);
            $user->password = $request->password;
        }
        if ($request->filled('age')) {
            $request->validate([
                'age' => 'nullable|numeric',
            ]);
            $user->age = $request->age;
        }
        if ($request->filled('height')) {
            $request->validate([
                'height' => 'nullable|numeric|between:0, 9.9',
            ]);
            $user->height = $request->height;
        }
        if ($request->filled('gender')) {
            $request->validate([
                'gender' => 'nullable',
            ]);
            $user->gender = $request->gender;
        }
        if ($request->filled('bio')) {
            $request->validate([
                'bio' => 'nullable',
            ]);
            $user->bio = $request->bio;
        }
        if ($request->filled('birthday')) {
            $request->validate([
                'birthday' => 'nullable|date',
            ]);
            $user->birthday = $request->birthday;
        }
        $user->save();
        // dd($user->email);
        Mail::to($user->email)->send(new UserAccountUpdated());
        // Inertia::share('errors', session('errors')->getBag('default')->toArray());
        // return redirect('/users')->with('success', 'User updated!');
        // return redirect('/users/settings')->with(['success' => 'User updated!']);
        // return redirect('/users/settings')->with('success', 'User updated!');
        return redirect()->back()->with('success', 'Profile updated successfully');
        // return redirect('/users/settings')->with(secure_url('success', 'User updated!'));

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Mail::to($user->email)->send(new UserAccountUpdated());
        return redirect('Home')->with(secure_url('success', 'Account deleted!'));
        // return redirect('/users')->with('success', 'Account deleted!');
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
