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
        Schema::create( 'deltas' , function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'build_id' );
            $table->string( 'build_string' );
            $table->integer( 'platform_id' )->unsigned();
            $table->text( 'changelog' );
        });

        Schema::table( 'deltas', function ( Blueprint $table ) {
            $table->foreign( 'build_id' )->references( 'id' )->on( 'builds' )->onDelete( 'cascade' );;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'deltas', function ( Blueprint $table ) {
            $table->dropForeign( 'deltas_build_id_foreign' );
        });

        Schema::dropIfExists( 'deltas' );
    }
}
