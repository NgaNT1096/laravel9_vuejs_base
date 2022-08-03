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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('max_player');
            $table->integer('max_layout')->default(3);
            $table->string('time_of_mission')->default(3);
            $table->string('spectator')->default('on');
            $table->string('mobile_controller')->default('0');
            $table->string('tournament_manager')->default('0');
            $table->string('webpage_tournament')->default('0');
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
        Schema::dropIfExists('products');
    }
};
