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
            $table->string('surname', 100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('role')->default(0); // 0 stands for Root Admin

            $table->integer('category')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('years_old')->nullable();
            $table->string('birth_place', 100)->nullable();
            $table->integer('citizenship')->nullable();
            $table->string('phone_number', 30)->nullable();
            $table->integer('gender')->nullable();
            $table->string('height')->nullable();
            $table->integer('sport')->nullable();
            $table->integer('position')->nullable();
            $table->integer('leg_arm')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
