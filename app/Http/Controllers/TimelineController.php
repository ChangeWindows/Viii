<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Delta;
use App\Build;

class TimelineController extends Controller
{
    public function __construct()
    {
    }
    
    public function index() {
        $flights = Flight::join( 'deltas', 'deltas.id', '=', 'flights.delta_id')
                ->join( 'builds', 'builds.id', '=', 'deltas.build_id')
                ->join( 'milestones', 'milestones.id', '=', 'builds.milestone_id')
                ->join( 'platforms', 'platforms.id', '=', 'deltas.platform_id')
                ->join( 'rings', 'rings.id', '=', 'flights.ring_id')
                ->orderBy( 'release', 'desc' )->paginate( 100 );

        //dd( $flights );

        return view( 'timeline.index', compact( 'flights' ) );
    }
}
