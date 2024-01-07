<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApiStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users__api_statistics', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->string('season');
            $table->string('team_name');

            /* Rest is the same as previous */
            $table->integer('no_games')->default(0);
            $table->integer('goals')->default(0);
            $table->integer('assistance')->default(0);
            $table->integer('minutes')->default(0);
            $table->integer('red_cards')->default(0);
            $table->integer('yellow_cards')->default(0);

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
        Schema::dropIfExists('users__api_statistics');
    }
}
