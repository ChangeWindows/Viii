<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Platform;
use App\Ring;

class Release extends Model
{
    protected $fillable = ['build_id', 'build_string', 'platform', 'ring', 'release'];
    public $timestamps = false;

    function getPlatformName( $notation = 'default ') {
        if ( $notation == 'default ') {
            return Platform::find( $this->platform )->name;
        } else if ( $notation == 'class' ) {
            return strtolower( Platform::find( $this->platform )->name );
        }
    }

    function getRingName( $notation = 'default ') {
        if ( $notation == 'default ') {
            switch( $this->platform ) {
                case 3:
                    return Ring::find( $this->ring )->xbox_name;
                case 4:
                case 5:
                case 6:
                case 7:
                    return Ring::find( $this->ring )->other_name;
                default:
                    return Ring::find( $this->ring )->default_name;
            }
        } else if ( $notation == 'short' ) {
            switch( $this->platform ) {
                case 3:
                    return Ring::find( $this->ring )->xbox_short;
                case 4:
                case 5:
                case 6:
                case 7:
                    return Ring::find( $this->ring )->other_short;
                default:
                    return Ring::find( $this->ring )->default_short;
            }
        } else if ( $notation == 'class' ) {
            return strtolower( Ring::find( $this->ring )->default_short );
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
