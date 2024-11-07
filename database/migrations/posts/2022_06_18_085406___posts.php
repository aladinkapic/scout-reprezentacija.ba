<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->integer('category')->default(0)->nullable();
            $table->integer('owner')->default(0)->nullable();

            $table->text('post');
            $table->string('file')->nullable();
            $table->string('file_orientation')->default('v')->nullable();
            $table->string('ext')->nullable();
            $table->string('youtube')->nullable();
            $table->integer('likes')->default(0);

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
        Schema::dropIfExists('posts');
    }
}
