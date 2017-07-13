<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Platform;
use App\Ring;

class Delta extends Model
{
    protected $fillable = ['build_id', 'build_string', 'platform_id', 'changelog'];
    public $timestamps = false;
    
    public function builds() {
        return $this->belongsTo( 'App\Build', 'build_id', 'id' );
    }
    
    public function flights() {
        return $this->hasMany( 'App\Flight', 'flight_id', 'id' );
    }

    function getPlatformName( $notation = 'default' ) {
        if ( $notation == 'default ') {
            return Platform::find( $this->platform_id )->name;
        } else if ( $notation == 'class' ) {
            return strtolower( Platform::find( $this->platform_id )->name );
        }
    }

    function getString( $type = 'default' ) {
        // Figure out the location of dots
        $first_dot = strpos( $this->build_string, '.', 0 ) + 1; // Major kernel - minor kernel
        $second_dot = strpos( $this->build_string, '.', $first_dot ) + 1; // Minor kernel - build
        $third_dot = strpos( $this->build_string, '.', $second_dot ) + 1; // Build - delta

        // Get the kernel number
        $kernel = substr( $this->build_string, 0, $second_dot - 1 );

        // Get the build number
        $build_length = $third_dot - $second_dot - 1;
        $build = substr( $this->build_string, $second_dot, $build_length );

        // Get the delta number
        $delta = substr( $this->build_string, $third_dot );
        
        if ( $type == 'full' )
            return $this->build_string;
        elseif ( $type == 'default' )
            return $build.'.'.$delta;
        elseif ( $type == 'build' )
            return $build;
        elseif ( $type == 'delta' )
            return $delta;
        elseif ( $type == 'kernel' )
            return $kernel;
        elseif ( $type == 'major' )
            return $kernel.'.'.$build;
    }
}
