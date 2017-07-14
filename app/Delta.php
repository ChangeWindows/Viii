<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Platform;
use App\Ring;

class Delta extends Model
{
    protected $fillable = ['build_id', 'build_string', 'changelog', 'platform_id'];
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
