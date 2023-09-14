<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weight;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Carbon\Carbon;


class WeightController extends Controller
{
    // get all weights
    public function index()
    {
        //get user id
        $id = Auth::id();
        $weights = Weight::where('user_id', $id)->get();

        foreach ($weights as $weight) {
            $weight->weigh_in_date = Carbon::parse($weight->weigh_in_date)->format('Y-m-d');
        }

        return Inertia::render('Users/Weight/Index', [
            'Weights' => $weights,
            'authenticated' => true
        ]);
    }
    
    // get single user weight
    public function show()
    {
        // //get user id
        // $id = Auth::id();
        // $weights = Weight::where('user_id', $id)->get();
        // // dd($weights);        
        // return Inertia::render('Users/Weight/Edit', [
        //     'Weights' => $weights,
        //     'authenticated' => true
        // ]);

        // // return response()->json($weight);
    }
    
    // create new weight
    public function store(Request $request)
    {
        $validated = $request->validate([
            'weight' => 'required',
            'body_fat' => 'required',
            'date' => 'required',
        ]);

        //check if weight already exists for that date
        $weight = Weight::where('weigh_in_date', $request->date)->first();
        if($weight){

            //edit date exsiting weight with new weight
            $weight->weight = $request->weight;
            $weight->body_fat = $request->body_fat;
            $weight->save();
            return redirect()->secure('p1/show');
            // return Inertia::render('Users/Show');
            // return redirect('users/show');
            // return response()->json($weight);
            // return response()->json(['error' => 'You already have a weight entry for that date']);
        }

        // dd($validated);
        $weight = new Weight();
        $weight->user_id = Auth::id(); // set the user ID to the current user's ID
        $weight->weight = $request->weight;
        $weight->body_fat = $request->body_fat;
        //set date
        $weight->weigh_in_date = $request->date;
        // ... set any other fields you need to set
        $weight->save();
 
        return redirect()->secure('p1/show');

        // return response()->json($weight);
    }
    
    // update weight
    public function update(Request $request)
    {
        $weight = Weight::find($request->id);
        $weight->weight = $request->weight;
        $weight->body_fat = $request->body_fat;
        $weight->weigh_in_date = $request->weigh_in_date;
        $weight->update($request->all());  
        return redirect()->secure('p1/weight/index');
    }
    
    // delete weight
    public function delete($id)
    {
        $weight = Weight::find($id);
        $weight->delete();
        return redirect()->back()->with('status', 'Weight deleted!');
        //return response()->json('Weight deleted!');
    }


}
