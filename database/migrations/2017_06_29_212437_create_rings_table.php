<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('default_name');
            $table->string('default_short');
            $table->string('default_acronym');
            $table->string('xbox_name');
            $table->string('xbox_short');
            $table->string('xbox_acronym');
            $table->string('other_name');
            $table->string('other_short');
            $table->string('other_acronym');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rings');
    }
}
