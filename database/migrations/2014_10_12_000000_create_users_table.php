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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('class')->default('villager');
            //Height in feet
            $table->integer('height')->nullable();
            //Gender
            $table->enum('gender', ['Male', 'Female'])->nullable();
            //Age
            $table->integer('age')->nullable();
            //Profile picture
            $table->binary('profile_pic')->nullable();
            //Bio
            $table->string('bio')->nullable();
            //health stat
            $table->integer('health')->default(100);
            //magic stat
            $table->string('magic')->default(100);
            //stamina stat
            $table->string('stamina')->default(100);
            //Total calories amount they can consume
            $table->integer('total_calories')->default(2000);
            //birthday
            $table->date('birthday')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
