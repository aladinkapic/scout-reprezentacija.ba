<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NatTeamData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users__nat_team_data', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->string('season');
            $table->integer('country_id');
            $table->integer('category');
            $table->integer('no_games')->default(0);
            $table->integer('goals')->default(0);
            $table->integer('assistance')->default(0);
            $table->integer('minutes')->default(0);
            $table->integer('red_cards')->default(0);
            $table->integer('yellow_cards')->default(0);
            $table->integer('without_goal')->nullable();
            $table->integer('no_invitations')->default(0)->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('users__nat_team_data');
    }
}
