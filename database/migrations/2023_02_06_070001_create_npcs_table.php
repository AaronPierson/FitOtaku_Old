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
        Schema::create('npcs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->string('location');
            
            $table->string('favourite_food');
            $table->string('favourite_drink');
            $table->string('favourite_colour');
            $table->string('favourite_song');
            $table->string('favourite_movie');
            $table->string('favourite_book');
            $table->string('favourite_animal');
            $table->string('favourite_flower');
            $table->string('favourite_season');
            $table->string('favourite_game');
            $table->string('favourite_sport');
            $table->string('favourite_toy');
            $table->string('favourite_thing');
            $table->string('favourite_saying');
            $table->string('favourite_place');
            $table->string('favourite_pastime');
            $table->string('favourite_thing_to_do');
            $table->string('favourite_thing_to_eat');
            $table->string('favourite_thing_to_drink');
            $table->string('favourite_thing_to_smell');
            $table->string('favourite_thing_to_touch');
            $table->string('favourite_thing_to_hear');
            $table->string('favourite_person');
            $table->string('least_favourite_person');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('npcs');
    }
};
