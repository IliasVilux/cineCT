<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->year('release_date')->nullable();
            $table->string('poster_path');
            $table->string('trailer_link')->nullable();
            $table->integer('seasons')->default(0);
            $table->integer('total_episodes')->default(0);
            $table->integer('duration');
            $table->boolean('top');
            $table->integer('puntuation');
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
        Schema::dropIfExists('animes');
    }
}
