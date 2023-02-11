<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calories', function (Blueprint $table) {
            $table->id();
            //User ID of the user who created the entry (foreign key)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //Date of the entry
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            //Updated at
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            //Calories consumed
            $table->integer('calories');
            //Meal type
            $table->enum('meal_type', ['breakfast', 'lunch', 'dinner', 'snack'])->nullable();
            //Food name
            $table->string('food_name')->nullable();
            //Servings
            $table->integer('servings')->nullable();
            //Calories per serving
            $table->integer('calories_per_serving')->nullable();
            //Date consumed
            $table->timestamp('date_consumed')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_calories');
    }
};
