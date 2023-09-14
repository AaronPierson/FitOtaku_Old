<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Models\Workout;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class WorkoutController extends Controller
{
    //add a workout
    // public function store(Request $request)
    // {
    //     $workout = new Workout;
    //     $workout->name = $request->name;
    //     // $workout->description = $request->description;
    //     // $workout->difficulty = $request->difficulty;
    //     // $workout->equipment = $request->equipment;
    //     // $workout->image = $request->image;
    //     // $workout->instructions = $request->instructions;
    //     $workout->user_id = auth()->id();
    //     $workout->save();
    
    //     $exerciseIds = $request->input('exercise_ids');
    //     if (!empty($exerciseIds)) {
    //         $workout->exercises()->sync($exerciseIds);
    //     }
    
    //     return back();
    // }

    // show all users workouts
    public function index()
    {
        //get user id
        $id = Auth::id();
        $user = User::find($id);
        //get user workout
        $workouts = Workout::where('user_id', $id)->get();
        return Inertia::render('Users/Workout/Index', [
            'User' => $user,
            'Workouts' => $workouts,
            'authenticated' => true
        ]);
        // return view('workouts.index', compact('workouts'));
    }

    // show a specific workout
    public function show($id)
    {
        // $workout = Workout::findOrFail($id);
        $workout = Workout::with('exercises')->findOrFail($id);
        $userName = User::find($workout->user_id)->name;
        return Inertia::render('Users/Workout/Show', [
            'workout' => $workout,
            'userName' => $userName,
        ]);
    }

    public function showExercises($id)
    {
        $exercises = Exercise::all();
        $workout = Workout::findOrFail($id);
        // dd($workout['id']);
        $userName = User::find($workout->user_id)->name;
        return Inertia::render('Users/Workout/Exercises', [
            'workoutId' => $workout['id'],
            'userName' => $userName,
            'exercises' => $exercises,
        ]);
    }

    public function addExercises(Request $request, $workoutId)
    {
        $selectedExercises = $request->input('exercises');
        $reps = $request->input('reps');
        $sets = $request->input('sets');
        // dd($workoutId, $selectedExercises, $reps, $sets);

        // Get the selected exercises, reps, and sets from the request body
        // $selectedExercises = $request->input('selectedExercises');
        // $exerciseReps = $request->input('exerciseReps');
        // $exerciseSets = $request->input('exerciseSets');

        // Add the selected exercises to the workout
        $workout = Workout::findOrFail($workoutId);

        $workout->exercises()->sync([]);
        //  dd($workout);
        foreach ($selectedExercises as $exerciseId) {
            $workout->exercises()->attach($exerciseId, [
            'reps' => $reps[$exerciseId],
            'sets' => $sets[$exerciseId],
            'user_id' => auth()->user()->id, // Add user_id value
            ]);

    }

    // Return a response indicating success
    return response()->json(['success' => true]);
    }


    public function store(Request $request)
    {
        // Create new workout
        $workout = new Workout;
        $workout->name = $request->name;
        $workout->description = $request->description;
        // Add other attributes as needed
        $workout->user_id = auth()->id();
        $workout->save();

        // Attach exercises to workout
        $exercises = $request->input('exercises');
        $workout->exercises()->attach($exercises, [
            'reps' => $request->input('reps'),
            'sets' => $request->input('sets'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('status', 'Workout created successfully!');
    }

    public function deleteWorkout($id)
    {
        $workout = Workout::findOrFail($id);
        $workout->delete();
        return redirect()->back()->with('status', 'Workout deleted successfully!');
    }

    
}
