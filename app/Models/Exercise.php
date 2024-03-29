<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    // public function workouts()
    // {
    //     return $this->belongsToMany(Workout::class);

    // }
    public function workouts()
    {
        return $this->belongsToMany('App\Models\Workout')->withPivot('reps', 'sets');
    }

}
