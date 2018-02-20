<?php

namespace App;

use App\Traits\SingleTableInheritance;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use SingleTableInheritance;

    protected $stiKey = 'platform_id';

    protected $stiChildren = [
        1 => \App\Pc::class,
        2 => \App\Mobile::class,
        3 => \App\Xbox::class,
        4 => \App\Server::class,
        5 => \App\MixedReality::class,
        6 => \App\IoT::class,
        7 => \App\Team::class,
    ];

    protected $table = 'builds';

    protected $fillable = ['id', 'major', 'minor', 'build', 'delta', 'platform_id', 'milestone_id', 'vnext', 'skip', 'fast', 'slow', 'preview', 'release', 'targeted', 'broad', 'lts'];

    public $timestamps = false;
    
    public function milestones() {
        return $this->belongsTo( 'App\Milestone', 'milestone_id', 'id' );
    }

    function getString( $type = 'default' ) {
        if ( $type == 'full' )
            return $this->major.'.'.$this->minor.'.'.$this->build.'.'.$this->delta;
        elseif ( $type == 'default' )
            return $this->build.'.'.$this->delta;
        elseif ( $type == 'build' )
            return $this->build;
        elseif ( $type == 'delta' )
            return $this->delta;
        elseif ( $type == 'kernel' )
            return $this->major.'.'.$this->minor;
        elseif ( $type == 'major' )
            return $this->major.'.'.$this->minor.'.'.$this->build;
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