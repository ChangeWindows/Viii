<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'changelogs' , function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'build' );
            $table->integer( 'delta' );
            $table->integer( 'platform_id' );
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
        Schema::dropIfExists('changelogs');
    }
}
