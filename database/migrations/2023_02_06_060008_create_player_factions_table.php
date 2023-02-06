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
        Schema::create('player_factions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //player_id
            $table->unsignedBigInteger('player_id');
            //faction_id
            $table->unsignedBigInteger('faction_id');
            //rank
            $table->unsignedBigInteger('rank_id');
            //join_date
            $table->date('join_date');
            //leave_date
            $table->date('leave_date')->nullable();
            //is_member
            $table->boolean('is_member')->default(false);

            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('faction_id')->references('id')->on('factions');
            $table->foreign('rank_id')->references('id')->on('ranks');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_factions');
    }
};
