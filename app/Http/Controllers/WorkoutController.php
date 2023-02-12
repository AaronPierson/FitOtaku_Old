<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workout;

class WorkoutController extends Controller
{
    //add a workout
    public function addWorkout(Request $request)
    {
        $workout = new Workout();
        $workout->user_id = $request->user()->id;
        $workout->workout_name = $request->workout_name;
        $workout->workout_type = $request->workout_type;
        $workout->workout_date = $request->workout_date;
        $workout->workout_duration = $request->workout_duration;
        $workout->workout_distance = $request->workout_distance;
        $workout->workout_calories = $request->workout_calories;
        $workout->workout_notes = $request->workout_notes;
        $workout->save();
    
        $exerciseIds = $request->input('exercise_ids');
        if (!empty($exerciseIds)) {
            $workout->exercises()->sync($exerciseIds);
        }
    
        return redirect()->route('workouts');
    }
    
}
