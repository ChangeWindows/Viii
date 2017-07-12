<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'milestones', function ( Blueprint $table ) {
            $table->string( 'id' )->primary();
            $table->string( 'os' );
            $table->string( 'name' );
            $table->string( 'codename' );
            $table->integer( 'version' );
            $table->string( 'color' );
            $table->text( 'description' );
        });

        Schema::table( 'builds', function ( Blueprint $table ) {
            $table->foreign( 'milestone_id' )->references( 'id' )->on( 'milestones' )->onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'builds', function ( Blueprint $table ) {
            $table->dropForeign( 'builds_milestone_id_foreign' );
        });

        Schema::dropIfExists( 'milestones' );
    }
}
