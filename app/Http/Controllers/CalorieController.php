<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calorie;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Carbon\Carbon;

class CalorieController extends Controller
{

    //get all calories
    public function index()
    {
        //get user id
        $id = Auth::id();
        $calories = Calorie::where('user_id', $id)->get();

        foreach ($calories as $calorie) {
            $calorie->date_consumed = Carbon::parse($calorie->date_consumed)->format('Y-m-d');
        }

        return Inertia::render('Users/Calories/Index', [
            'Calories' => $calories,
            'authenticated' => true
        ]);
    }
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
        $calorie->meal_type = $request->meal_type;
        $calorie->food_name = $request->name;
        //set date
        $calorie->date_consumed = $request->date;
        // ... set any other fields you need to set
        // dd($calorie);
        try {
            $calorie->save();
        } catch (\Exception $e) {
            // Handle the exception here
            dd($e);
        }        
        // $calorie = Calorie::create([
        //     'calories' => $validated['calories'],
        //     'date' => $validated['date'],
        // ]);
        //  dd($calorie);    
        // return redirect('users/show');
        return redirect()->secure('p1/show');

    }

    //show user's calorie data
    public function show()
    {
        $id = Auth::id(); // get the current user's ID
        $calories = Calorie::where('user_id', $id)->get();
         dd($calories);
        return view('users.show', compact('calories'));
    }

    //update calorie data
    public function update(Request $request){
        $calorie = Calorie::find($request->id);
        $calorie->calories = $request->calories;
        $calorie->meal_type = $request->meal_type;
        $calorie->food_name = $request->name;
        //set date
        $calorie->date_consumed = $request->date;
        $calorie->save();
        return redirect()->secure('p1/calories/index');
    }

    //delete calorie data
    public function delete($id)
    {
        $calorie = Calorie::find($id);
        $calorie->delete();
        return redirect()->back()->with('status', 'Deleted!');
        // return redirect()->secure('p1/calories/index');
    }
}
