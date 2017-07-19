<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Build;
use App\Delta;
use App\Flight;

class ReleaseController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index( Build $build ) {
        $flights = Flight::join( 'deltas', 'flights.delta_id', '=', 'deltas.id')
                ->select( ['flights.id', 'flights.ring_id', 'flights.delta_id', 'flights.release', 'deltas.build_id', 'deltas.delta', 'deltas.platform_id'] )
                ->where( 'build_id', $build->id )
                ->orderBy( 'deltas.delta', 'desc' )
                ->orderBy( 'deltas.platform_id', 'asc' )
                ->orderBy( 'flights.ring_id', 'asc' )
                ->paginate( 100 );

        $current_delta = 0;
            
        return view( 'release.index', compact( 'build', 'flights', 'current_delta' ) );
    }
}
