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
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBiginteger('game_id')->unsigned();
            $table->unsignedBiginteger('winner_id')->unsigned();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('winner_id')->references('id')->on('gamers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winners');
    }
};
