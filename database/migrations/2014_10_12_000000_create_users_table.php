<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('role')->default(0); // 0 stands for Root Admin

            $table->string('image')->nullable();
            $table->integer('category')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('years_old')->nullable();
            $table->integer('birth_year')->nullable();
            $table->string('birth_place', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('living_place', 100)->nullable();
            $table->integer('citizenship')->nullable();
            $table->integer('citizenship_2')->nullable();
            $table->string('phone', 30)->nullable();
            $table->integer('gender')->nullable();
            $table->string('height')->nullable();
            $table->string('sport')->nullable();
            $table->string('init_club')->nullable();
            $table->integer('position')->nullable();
            $table->integer('position_2')->nullable();
            $table->integer('stronger_limb')->nullable();
            $table->text('note')->nullable();
            $table->string('under_contract')->default('Ne')->nullable();

            $table->integer('allow_rating')->default(0)->nullable();

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();

            /* For special players; Update api */
            $table->tinyInteger('from_api')->default(false)->nullable();
            $table->integer('player_id')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
