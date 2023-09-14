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
            $table->timestamps();
            //weight in pounds
            $table->decimal('weight', 4, 1);
            //body fat percentage
            $table->integer('body_fat')->nullable();
            //User ID of the user who created the entry (foreign key)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //Weigh in Date
            $table->timestamp('weigh_in_date')->nullable();
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
