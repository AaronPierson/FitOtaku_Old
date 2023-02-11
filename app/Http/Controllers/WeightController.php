<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weight;
use Illuminate\Support\Facades\Auth;


class WeightController extends Controller
{
    // get all weights
    public function index()
    {
        //get user id
        $user_id = Auth::id();
        $weights = Weight::all($user_id);
        return response()->json($weights);
    }
    
    // get single user weight
    public function show($id)
    {
        $weight = Weight::find($id);
        return response()->json($weight);
    }
    
    // create new weight
    public function store(Request $request)
    {
        $validated = $request->validate([
            'weight' => 'required',
            'body_fat' => 'required',
            'date' => 'required',
        ]);
        // dd($validated);
        $weight = new Weight();
        $weight->user_id = Auth::id(); // set the user ID to the current user's ID
        $weight->weight = $request->weight;
        $weight->body_fat = $request->body_fat;
        //set date
        $weight->weigh_in_date = $request->date;
        // ... set any other fields you need to set
        $weight->save();


        // $weight = Weight::create([
        //     'weight' => $validated['weight'],
        //     'body_fat' => $validated[null],
        //     'weigh_in_date' => $validated['date'],
        // ]);
        // dd($weight);    
        return response()->json($weight);
    }
    
    // update weight
    public function update($id, Request $request)
    {
        $weight = Weight::find($id);
        $weight->update($request->all());
        return response()->json($weight);
    }
    
    // delete weight
    public function delete($id)
    {
        $weight = Weight::find($id);
        $weight->delete();
        return response()->json('Weight deleted!');
    }


}
