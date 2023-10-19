<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_gamer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBiginteger('game_id')->unsigned();
            $table->unsignedBiginteger('gamer_id')->unsigned();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('gamer_id')->references('id')->on('gamers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_gamer');
    }
};
