<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;
    // public function exercises()
    // {
    //     return $this->belongsToMany(Exercise::class);

    // }
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'workout_exercise')
            ->withPivot('reps', 'sets')
            ->withTimestamps();
    }


    // SavedWorkout.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
