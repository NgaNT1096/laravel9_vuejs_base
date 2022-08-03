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
        Schema::create('matchups', function (Blueprint $table) {
            $table->id();
            $table->string('id_matchup');
            $table->datetime('datetime')->nullable();
            $table->string('type')->default('playoff');
            $table->string('status')->default('vua tao');
            $table->integer('team_red_score')->default(0);
            $table->integer('team_blue_score')->default(0);
            $table->foreignId('tournament_id')->constrained('tournaments', 'id')->onDelete('cascade');

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
        Schema::dropIfExists('matchups');
    }
};
