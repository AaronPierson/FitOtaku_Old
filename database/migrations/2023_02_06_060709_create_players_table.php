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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('class');
            //Height in feet
            $table->integer('height');
            //Gender
            $table->enum('gender', ['Male', 'Female']);
            //Age
            $table->integer('age');
            //Profile picture
            $table->blob('profile_pic');
            //Bio
            $table->string('bio');
            //health stat
            $table->integer('health');
            //magic stat
            $table->string('magic');
            //stamina stat
            $table->string('stamina');
            //Total calories amount they can consume
            $table->integer('total_calories');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
