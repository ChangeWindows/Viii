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

    static function getRingName( $id ) {
        switch( $id ) {
            case 1:
                return 'vNext';
            case 2:
                return 'Fast Ring';
            case 3:
                return 'Slow Ring';
            case 4:
                return 'Preview Ring';
            case 5:
                return 'Release Preview Ring';
            case 6:
                return 'Semi-Annual Pilot Channel';
            case 7:
                return 'Semi-Annual Broad Channel';
            case 8:
                return 'Long-Term Support Channel';
        }
    }
}
