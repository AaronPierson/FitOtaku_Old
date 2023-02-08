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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->binary('image');
            $table->binary('video');
            $table->string('category');
            $table->string('difficulty');
            $table->string('equipment');
            $table->string('muscle_group');
            $table->string('exercise_level');
            $table->string('calories_burned');
            $table->string('benefits');
            $table->string('precautions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excercises');
    }
};
