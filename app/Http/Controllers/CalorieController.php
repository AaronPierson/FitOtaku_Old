<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calorie;
use Illuminate\Support\Facades\Auth;

class CalorieController extends Controller
{
    //create new calorie tracker
    public function store(Request $request)
    {
        $validated = $request->validate([
            'calories' => 'required',
            'date' => 'required',
        ]);

        $calorie = new Calorie();
        $calorie->user_id = Auth::id(); // set the user ID to the current user's ID
        $calorie->calories = $request->calories;
        // $calorie->meal_type = $request->meal_type;
        //set date
        $calorie->date_consumed = $request->date;
        // ... set any other fields you need to set
        $calorie->save();

        // $calorie = Calorie::create([
        //     'calories' => $validated['calories'],
        //     'date' => $validated['date'],
        // ]);
        //  dd($calorie);    
        return redirect('users/show');
    }

    //show user's calorie data
    public function show()
    {
        $id = Auth::id(); 

        $calories = Calorie::where('user_id', $id)->get();
         dd($calories);
        return view('users.show', compact('calories'));
    }
}
