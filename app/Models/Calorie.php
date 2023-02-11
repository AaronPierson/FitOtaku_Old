<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'calories',
        'meal_type',
        'food_name',
        'servings',
        'calories_per_serving',
        'date_consumed',
    ];
}
