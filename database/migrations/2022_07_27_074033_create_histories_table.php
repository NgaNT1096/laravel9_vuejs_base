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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->datetime('time_start_game')->nullable();
            $table->string('status')->nullable();
            $table->datetime('time_end_game')->nullable();
            $table->string('winner')->nullable();

            $table->timestamps();

            $table->string('red_team')->nullable();
            $table->string('score_red_team')->nullable();
            $table->string('blue_team')->nullable();
            $table->string('score_blue_team')->nullable();

            $table->string('number_player')->nullable();
            $table->string('time_use')->nullable();

            $table->string('time_use_convert')->nullable();
            $table->string('game_mode')->nullable();
            $table->string('style_map')->nullable();
            $table->string('size_map')->nullable();

            $table->foreignId('match_id')->constrained('matchups', 'id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('ipaddresses_id')->constrained('ipaddresses', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
};
