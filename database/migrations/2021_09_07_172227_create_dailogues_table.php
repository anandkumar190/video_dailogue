<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailoguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailogues', function (Blueprint $table) {
            $table->id();
            $table->integer('movie_id');
            $table->string('start_time',12);
            $table->string('end_time',12);
            $table->string('character_name');
            $table->string('dailogue');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dailogues');
    }
}
