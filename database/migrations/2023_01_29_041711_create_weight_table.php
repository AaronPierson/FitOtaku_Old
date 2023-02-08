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
        Schema::create('weights', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('taken_at');
            //weight in pounds
            $table->integer('weight');
            //body fat percentage
            $table->integer('body_fat');
            //User ID of the user who created the entry (foreign key)
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            //Weigh in Date
            $table->timestamp('weigh_in_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weight');
    }
};
