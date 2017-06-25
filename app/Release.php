<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $fillable = ['build_id', 'build_string', 'platform', 'ring'];

    static function getPlatformName( $id ) {
        switch( $id ) {
            case 1:
                return 'PC';
            case 2:
                return 'Mobile';
            case 3:
                return 'Xbox';
            case 4:
                return 'Server';
            case 5:
                return 'IoT';
            case 6:
                return 'Team';
            case 7:
                return 'Mixed Reality';
        }
    }

    static function getRingName( $id, $platform = 1 ) {
        switch( $id ) {
            case 1:
                return 'vNext';
            case 2:
                switch( $platform ) {
                    case 3:
                        return 'Alpha Ring';
                    default:
                        return 'Fast Ring';
                }
            case 3:
                switch( $platform ) {
                    case 3:
                        return 'Beta Ring';
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                        return 'Preview';
                    default:
                        return 'Slow Ring';
                }
            case 4:
                return 'Ring 3';
            case 5:
                switch( $platform ) {
                    case 3:
                        return 'Ring 4';
                    default:
                        return 'Release Preview Ring';
                }
            case 6:
                switch( $platform ) {
                    case 3:
                    case 5:
                    case 6:
                    case 7:
                        return 'Production';
                    default:
                        return 'Semi-Annual Pilot Channel';
                }
            case 7:
                return 'Semi-Annual Broad Channel';
            case 8:
                return 'Long-Term Servicing Channel';
        }
    }

    static function getString( $string, $type = 'default' ) {
        // Figure out the location of dots
        $first_dot = strpos( $string, '.', 0 ) + 1; // Major kernel - minor kernel
        $second_dot = strpos( $string, '.', $first_dot ) + 1; // Minor kernel - build
        $third_dot = strpos( $string, '.', $second_dot ) + 1; // Build - delta

        // Get the kernel number
        $kernel = substr( $string, 0, $second_dot - 1 );

        // Get the build number
        $build_length = $third_dot - $second_dot - 1;
        $build = substr( $string, $second_dot, $build_length );

        // Get the delta number
        $delta = substr( $string, $third_dot );
        
        if ( $type == 'full' )
            return $string;
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
