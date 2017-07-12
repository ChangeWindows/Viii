<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deltas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('build_id');
            $table->string('build_string');
            $table->integer('platform');
            $table->integer('ring');
            $table->date('release');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deltas');
    }
}
