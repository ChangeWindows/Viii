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
            $table->string( 'short' );
            $table->integer( 'version' );
            $table->string( 'color' );
            $table->text( 'description' );
            $table->date( 'preview' )->nullable();
            $table->date( 'release' )->nullable();
            $table->date( 'extension' )->nullable();
            $table->date( 'mainstream' )->nullable();
            $table->date( 'extended' )->nullable();
            $table->integer( 'pc_next' )->default( 0 );
            $table->integer( 'pc_fast' )->default( 0 );
            $table->integer( 'pc_slow' )->default( 0 );
            $table->integer( 'pc_release' )->default( 0 );
            $table->integer( 'pc_targeted' )->default( 0 );
            $table->integer( 'pc_broad' )->default( 0 );
            $table->integer( 'pc_lts' )->default( 0 );
            $table->integer( 'mobile_next' )->default( 0 );
            $table->integer( 'mobile_fast' )->default( 0 );
            $table->integer( 'mobile_slow' )->default( 0 );
            $table->integer( 'mobile_release' )->default( 0 );
            $table->integer( 'mobile_targeted' )->default( 0 );
            $table->integer( 'mobile_broad' )->default( 0 );
            $table->integer( 'server_next' )->default( 0 );
            $table->integer( 'server_slow' )->default( 0 );
            $table->integer( 'server_targeted' )->default( 0 );
            $table->integer( 'server_broad' )->default( 0 );
            $table->integer( 'server_lts' )->default( 0 );
            $table->integer( 'xbox_next' )->default( 0 );
            $table->integer( 'xbox_fast' )->default( 0 );
            $table->integer( 'xbox_slow' )->default( 0 );
            $table->integer( 'xbox_preview' )->default( 0 );
            $table->integer( 'xbox_release' )->default( 0 );
            $table->integer( 'xbox_targeted' )->default( 0 );
            $table->integer( 'iot_next' )->default( 0 );
            $table->integer( 'iot_slow' )->default( 0 );
            $table->integer( 'iot_targeted' )->default( 0 );
            $table->integer( 'iot_broad' )->default( 0 );
            $table->integer( 'holographic_next' )->default( 0 );
            $table->integer( 'holographic_slow' )->default( 0 );
            $table->integer( 'holographic_targeted' )->default( 0 );
            $table->integer( 'holographic_broad' )->default( 0 );
            $table->integer( 'holographic_lts' )->default( 0 );
            $table->integer( 'team_next' )->default( 0 );
            $table->integer( 'team_slow' )->default( 0 );
            $table->integer( 'team_release' )->default( 0 );
            $table->integer( 'team_targeted' )->default( 0 );
            $table->integer( 'team_broad' )->default( 0 );
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
