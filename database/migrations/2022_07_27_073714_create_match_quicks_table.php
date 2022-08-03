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
        Schema::create('match_quicks', function (Blueprint $table) {
            $table->id();
            $table->string('redteam_name')->null();
            $table->string('redteam_score')->null();

            $table->string('blueteam_name')->null();
            $table->string('blueteam_score')->null();

            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');

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
        Schema::dropIfExists('match_quicks');
    }
};
