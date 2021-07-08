<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('party', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            // $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('game_id')->references('id')->on('game');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('party');
    }
}
