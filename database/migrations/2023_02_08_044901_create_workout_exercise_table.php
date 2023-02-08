<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_exercise', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('reps');
            $table->unsignedInteger('sets');
            //workout_id
            $table->foreign('id')->references('id')->on('workouts')->onDelete('cascade');
            //exercise_id
            $table->foreign('id')->references('id')->on('exercises')->onDelete('cascade');
            //user that created the workout
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workout_exercise');
    }
};
