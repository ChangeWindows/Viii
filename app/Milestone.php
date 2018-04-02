<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'os', 'name', 'codename', 'short', 'version', 'color', 'description', 'preview', 'release', 'extension', 'mainstream', 'extended', 'pc_next', 'pc_fast', 'pc_slow', 'pc_release', 'pc_targeted', 'pc_broad', 'pc_lts', 'mobile_next', 'mobile_fast', 'mobile_slow', 'mobile_release', 'mobile_targeted', 'mobile_broad', 'server_next', 'server_slow', 'server_targeted', 'server_broad', 'server_lts', 'xbox_next', 'xbox_fast', 'xbox_slow', 'xbox_preview', 'xbox_release', 'xbox_targeted', 'iot_next', 'iot_slow', 'iot_targeted', 'iot_broad', 'holographic_next', 'holographic_slow', 'holographic_targeted', 'holographic_broad', 'holographic_lts', 'team_next', 'team_slow', 'team_release', 'team_targeted', 'team_broad'];
    public $timestamps = false;
    
    public function builds() {
        return $this->hasMany( 'App\Build', 'build_id', 'id' );
    }

    static function getMilestoneByString( $string ) {
        $build = $string['build'];
        $major = $string['major'];

        // DO NOT HARDCODE DO NOT HARDCODE DO NOT HARDCODE
        if ( $major == 7 ) {
            if ( $build < 7500 )
                $milestone = 'photon';
            else
                $milestone = 'mango';
        } else {
            if ( $build < 9250 )
                $milestone = 'eight';
            else if ( $build < 9700 )
                $milestone = 'blue';
            else if ( $build < 10250 )
                $milestone = 'threshold1';
            else if ( $build < 10600 )
                $milestone = 'threshold2';
            else if ( $build < 14400 )
                $milestone = 'redstone1';
            else if ( $build < 16000 )
                $milestone = 'redstone2';
            else if ( $build < 16300 )
                $milestone = 'redstone3';
            else if ( $build < 16600 )
                $milestone = 'redstone4';
            else
                $milestone = 'redstone5';
        }

        return $milestone;

        // Damn it.
        // In all fairness, this needs a bottom and top range for which build should be in which milestone
        // additionally, the create build form should have an override for the early skip ahead builds
    }
}
