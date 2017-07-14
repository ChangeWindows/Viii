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
                ->where( 'build_id', $build->id )
                ->orderBy( 'build_string', 'desc' )
                ->orderBy( 'platform_id', 'desc' )
                ->orderBy( 'ring_id', 'desc' )
                ->paginate( 100 );
            
        return view( 'release.index', compact( 'build', 'flights' ) );
    }
}
