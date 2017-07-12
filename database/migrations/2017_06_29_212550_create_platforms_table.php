<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'platforms', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'name' );
        });

        Schema::table( 'deltas' , function ( Blueprint $table ) {
            $table->foreign( 'platform_id' )->references( 'id' )->on( 'platforms' )->onDelete( 'cascade' );;
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
            $table->dropForeign( 'deltas_platform_id_foreign' );
        });

        Schema::dropIfExists( 'platforms' );
    }
}
