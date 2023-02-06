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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->integer('gold');
            $table->enum('type', ['throwable', 'consumable', 'misc']);
            $table->enum('effects', 
                ['heal', 'damage', 'stun', 'poison', 'bleed', 'burn', 'freeze', 'blind', 'silence', 'slow', 'speed', 'jump', 'teleport', 
                 'regen', 'reflect', 'stealth', 'invisibility', 'invulnerability', 'resist', 'absorb', 'drain', 'life steal', 'crit', 'crit damage', 
                'crit resist', 'crit damage resist', 'dodge resist', 'dodge damage resist', 
                'accuracy', 'accuracy damage', 'accuracy resist', 'accuracy damage resist', 'speed', 'speed damage', 'speed resist', 'speed damage resist', 'jump', 'jump damage', 
                'jump resist', 'jump damage resist', 'teleport', 'teleport damage', 'teleport resist', 'teleport damage resist', 'shield', 'shield damage', 'shield resist', 'shield damage resist', 
                'armor', 'armor damage', 'armor resist', 'armor damage resist', 'regen', 'regen damage', 'regen resist', 'regen damage resist', 'reflect', 'reflect damage', 'reflect resist', 'reflect damage resist', 
                'stealth', 'stealth damage', 'stealth resist', 'stealth damage resist', 'invisibility', 'invisibility damage', 'invisibility resist', 'invisibility damage resist', 'invulnerability', 'invulnerability damage', 
                'invulnerability resist', 'invulnerability damage resist', 'resist', 'resist damage', 'resist resist', 'resist damage resist', 'absorb', 'absorb damage', 'absorb resist', 'absorb damage resist', 'drain', 'drain damage', 
                'drain resist', 'drain damage resist', 'life steal', 'life steal damage',
                'block damage resist', 'dodge', 'dodge damage', 'dodge resist', 'dodge damage resist', 'accuracy', 'accuracy damage', 'accuracy resist', 'accuracy damage resist', 
                'speed', 'speed damage', 'speed resist', 'speed damage resist', 'jump', 'jump damage', 'jump resist', 'jump damage resist', 'teleport',
                ]);
            $table->integer('effect_amount');
            $table->integer('effect_duration');
            $table->enum('primary_attribute', ['strength', 'dexterity', 'intelligence', 'wisdom', 'charisma', 'constitution', 'luck']);
            $table->enum('derived_attribute', ['Health', 'Magicka', 'Fatigue']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
