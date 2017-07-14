<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $dates = ['release'];
    protected $fillable = ['release', 'ring_id', 'delta_id'];
    public $timestamps = false;
    
    public function deltas() {
        return $this->belongsTo( 'App\Delta', 'delta_id', 'id' );
    }
    
    public function rings() {
        return $this->hasOne( 'App\Ring', 'ring_id', 'id' );
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

    function getRingName( $notation = 'default' ) {
        if ( $notation == 'id' ) {
            return $this->ring_id;
        } else if ( $notation == 'short' ) {
            if ( $this->ring_id == 1 )
                return 'Leak';
            if ( $this->ring_id == 2 )
                switch ( $this->deltas->platform_id ) {
                    case 3:
                        return 'Alpha';
                    default:
                        return 'Fast';
                }
            if ( $this->ring_id == 3 )
                switch ( $this->deltas->platform_id ) {
                    case 1:
                    case 2:
                        return 'Slow';
                    case 3:
                        return 'Beta';
                    default:
                        return 'Preview';
                }
            if ( $this->ring_id == 4 )
                switch ( $this->deltas->platform_id ) {
                    case 3:
                        return 'Ring 3';
                    default:
                        return 'Preview';
                }
            if ( $this->ring_id == 5 )
                switch ( $this->deltas->platform_id ) {
                    case 3:
                        return 'Ring 4';
                    default:
                        return 'Release';
                }
            if ( $this->ring_id == 6 )
                return 'Pilot';
            if ( $this->ring_id == 7 )
                return 'Broad';
            if ( $this->ring_id == 8 )
                return 'LTS';
        } else if ( $notation == 'default' ) {
            if ( $this->ring_id == 1 )
                return 'Leak';
            if ( $this->ring_id == 2 )
                switch ( $this->deltas->platform_id ) {
                    case 3:
                        return 'Alpha Ring';
                    default:
                        return 'Fast Ring';
                }
            if ( $this->ring_id == 3 )
                switch ( $this->deltas->platform_id ) {
                    case 1:
                    case 2:
                        return 'Slow Ring';
                    case 3:
                        return 'Beta Ring';
                    default:
                        return 'Preview';
                }
            if ( $this->ring_id == 4 )
                switch ( $this->deltas->platform_id ) {
                    case 3:
                        return 'Ring 3';
                    default:
                        return 'Preview';
                }
            if ( $this->ring_id == 5 )
                switch ( $this->deltas->platform_id ) {
                    case 3:
                        return 'Ring 4';
                    default:
                        return 'Release Preview';
                }
            if ( $this->ring_id == 6 )
                return 'Semi-Annual Pilot';;
            if ( $this->ring_id == 7 )
                return 'Semi-Annual Broad';
            if ( $this->ring_id == 8 )
                return 'Long-Term Servicing Channel';
        } else if ( $notation == 'class' ) {
            if ( $this->ring_id == 1 )
                return 'leak';
            if ( $this->ring_id == 2 )
                return 'fast';
            if ( $this->ring_id == 3 )
                return 'slow';
            if ( $this->ring_id == 4 )
                return 'preview';
            if ( $this->ring_id == 5 )
                return 'release';
            if ( $this->ring_id == 6 )
                return 'pilot';
            if ( $this->ring_id == 7 )
                return 'broad';
            if ( $this->ring_id == 8 )
                return 'ltsc';
        }
    }
}
