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
        $flights = Flight::with( ['deltas', 'builds', 'milestones', 'platforms', 'rings'] )->orderBy( 'release', 'desc' )->paginate( 100 );

        //dd( $flights );

        return view( 'timeline.index', compact( 'flights' ) );
    }
}
