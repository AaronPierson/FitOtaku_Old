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
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->binary('image')->nullable();
            $table->binary('video')->nullable();
            $table->string('category')->nullable();
            $table->enum('difficulty', ['Easy', 'Medium', 'Hard']);
            $table->string('equipment')->nullable();
            $table->string('muscle_group')->nullable();
            $table->string('exercise_level')->nullable();
            $table->string('calories_burned')->nullable();
            $table->string('benefits')->nullable();
            $table->string('precautions')->nullable();
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
