<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Platform;
use App\Ring;

class Delta extends Model
{
    protected $fillable = ['build_id', 'major', 'minor', 'delta', 'changelog', 'platform_id'];
    public $timestamps = false;
    
    public function builds() {
        return $this->belongsTo( 'App\Build', 'build_id', 'id' );
    }
    
    public function flights() {
        return $this->hasMany( 'App\Flight', 'flight_id', 'id' );
    }

    function getPlatformName( $notation = 'default' ) {
        if ( $notation == 'default' ) {
            if ( $this->platform_id == 1 )
                return 'PC';
            if ( $this->platform_id == 2 )
                return 'Mobile';
            if ( $this->platform_id == 3 )
                return 'Xbox';
            if ( $this->platform_id == 4 )
                return 'Server';
            if ( $this->platform_id == 5 )
                return 'Mixed Reality';
            if ( $this->platform_id == 6 )
                return 'IoT';
            if ( $this->platform_id == 7 )
                return 'Team';
        } else if ( $notation == 'class' ) {
            if ( $this->platform_id == 1 )
                return 'pc';
            if ( $this->platform_id == 2 )
                return 'mobile';
            if ( $this->platform_id == 3 )
                return 'xbox';
            if ( $this->platform_id == 4 )
                return 'server';
            if ( $this->platform_id == 5 )
                return 'reality';
            if ( $this->platform_id == 6 )
                return 'iot';
            if ( $this->platform_id == 7 )
                return 'team';
        } else if ( $notation == 'id' ) {
            return $this->platform_id;
        }
    }

    function getString( $type = 'default' ) {
        if ( $type == 'full' )
            return $this->major.'.'.$this->minor.'.'.$this->build_id.'.'.$this->delta;
        elseif ( $type == 'default' )
            return $this->build_id.'.'.$this->delta;
        elseif ( $type == 'build' )
            return $this->build_id;
        elseif ( $type == 'delta' )
            return $this->delta;
        elseif ( $type == 'kernel' )
            return $this->major.'.'.$this->minor;
        elseif ( $type == 'major' )
            return $this->major.'.'.$this->minor.'.'.$this->build_id;
    }

    static function splitString( $build_string ) {
        // Figure out the location of dots
        $first_dot = strpos( $build_string, '.', 0 ) + 1; // Major kernel - minor kernel
        $second_dot = strpos( $build_string, '.', $first_dot ) + 1; // Minor kernel - build
        $third_dot = strpos( $build_string, '.', $second_dot ) + 1; // Build - delta

        // Get the major kernel number
        $major = substr( $build_string, 0, $first_dot - 1 );

        // Get the minor kernel number
        $minor_length = $second_dot - $first_dot - 1;
        $minor = substr( $build_string, $first_dot, $minor_length );

        // Get the build number
        $build_length = $third_dot - $second_dot - 1;
        $build = substr( $build_string, $second_dot, $build_length );

        // Get the delta number
        $delta = substr( $build_string, $third_dot );

        $string['major'] = $major;
        $string['minor'] = $minor;
        $string['build'] = $build;
        $string['delta'] = $delta;

        return $string;
    }
}
