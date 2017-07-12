<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'flights', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'delta_id' )->unsigned();
            $table->integer( 'ring_id' )->unsigned();
            $table->date( 'release' );
        });

        Schema::table( 'flights', function ( Blueprint $table ) {
            $table->foreign( 'delta_id' )->references( 'id' )->on( 'deltas' )->onDelete( 'cascade' );;
            $table->foreign( 'ring_id' )->references( 'id' )->on( 'rings' )->onDelete( 'cascade' );;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'flights', function ( Blueprint $table ) {
            $table->dropForeign( 'flights_delta_id_foreign' );
            $table->dropForeign( 'flights_ring_id_foreign' );
        });

        Schema::dropIfExists( 'flights' );
    }
}
