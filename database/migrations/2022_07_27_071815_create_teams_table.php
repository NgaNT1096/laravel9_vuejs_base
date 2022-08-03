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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_name');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
        Schema::create('players_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teams_id')->constrained('teams', 'id')->onDelete('cascade');

            $table->foreignId('players_id')->constrained('players', 'id')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('tournament_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teams_id')->constrained('teams', 'id')->onDelete('cascade');

            $table->foreignId('tournaments_id')->constrained('tournaments', 'id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('players_teams');
        Schema::dropIfExists('tournament_teams');
    }
};
