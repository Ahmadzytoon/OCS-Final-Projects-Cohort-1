<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('private_game_requests', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name');
            $table->string('phone');
            $table->string('email');
            $table->date('preferred_date');
            $table->time('preferred_time');
            $table->string('venue');
            $table->integer('duration');
            $table->string('total_players');
            $table->string('skill_level');
            $table->text('player_names')->nullable();
            $table->text('additional_info')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('private_game_requests');
    }
};