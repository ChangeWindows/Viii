<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'builds' , function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'build' );
            $table->integer( 'platform_id' );
            $table->string( 'milestone_id' );
            $table->integer( 'initial_delta' );
            $table->date( 'fast' )->nullable();
            $table->date( 'slow' )->nullable();
            $table->date( 'preview' )->nullable();
            $table->date( 'release' )->nullable();
            $table->date( 'pilot' )->nullable();
            $table->date( 'broad' )->nullable();
            $table->date( 'lts' )->nullable();
            $table->text( 'changelog' )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'builds' );
    }
}
