<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $fillable = ['id', 'major', 'minor', 'build', 'delta', 'platform_id', 'milestone_id', 'skip', 'fast', 'slow', 'preview', 'release', 'pilot', 'broad', 'lts', 'changelog'];
    public $timestamps = false;
    
    public function milestones() {
        return $this->belongsTo( 'App\Milestone', 'milestone_id', 'id' );
    }
    
    function getPlatform( $notation = 'default' ) {
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
            return explode( ' ', trim( getPlatform() ) )[0]; // Not sure this even works...
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
    
    function canPromote() {
        /*
        * 1 PC      1 => 2 => 3 =>      5 => 6 => 7 => 8
        * 2 Mobile  1 => 2 => 3 =>      5 => 6 => 7
        * 3 Xbox    1 => 2 => 3 => 4 => 5 => 6
        * 4 Server  1 =>      3 =>                7 => 8
        * 5 Mixed   1 =>                     6 => 7 => 8
        * 6 IoT     1 =>      3 =>           6 => 7
        * 7 Team    1 =>                     6 => 7
        */

        if ( isset ( $this->lts ) ) {
            return false; // Any platform that is on LTS can't promote
        } else {
            switch ( $this->platform_id ) {
                case 2:
                case 6:
                case 7:
                    if ( isset( $this->broad ) )
                        return false;
                    break;
                case 3:
                    if ( isset( $this->pilot ) )
                        return false;
                    break;
                default:
                    return true;
                    break;
            }
        }
    }
}
