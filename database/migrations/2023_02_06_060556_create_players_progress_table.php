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
        Schema::create('players_progress', function (Blueprint $table) {
            $table->id();
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->string('player_id');
            $table->integer('level');
            $table->integer('xp');
            $table->integer('gold');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players_progress');
    }
};
