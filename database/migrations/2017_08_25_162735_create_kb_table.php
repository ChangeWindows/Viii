<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'kb' , function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'build_id' );
            $table->integer( 'kb' );
            $table->date( 'release' );
            $table->string( 'changelog' )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'kb' );
    }
}
