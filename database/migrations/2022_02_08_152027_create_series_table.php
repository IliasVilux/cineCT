<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('poster_path');
            $table->text('description');
            $table->year('release_date')->nullable();
            $table->integer('seasons');
            $table->integer('total_episodes')->default(0);
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
        Schema::dropIfExists('series');
        Schema::table('series', function (Blueprint $table) {
            $table->year('release_date')->nullable(false)->change();
        });
    }
}
