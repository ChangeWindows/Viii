<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Build;
use App\Delta;
use App\Flight;

class BuildController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    public function index() {
        $builds = Build::orderBy( 'id', 'desc' )
                ->orderBy( 'milestone_id', 'asc' )
                ->paginate( 100 );

        $current_milestone = "";

        return view( 'backstage.build.index', compact( 'builds', 'current_milestone' ) );
    }

    public function show( Build $build ) {
        $flights = Flight::join( 'deltas', 'flights.delta_id', '=', 'deltas.id')
                ->select( ['flights.id', 'flights.ring_id', 'flights.delta_id', 'deltas.build_id', 'deltas.delta', 'deltas.platform_id'] )
                ->where( 'build_id', $build->id )
                ->orderBy( 'deltas.delta', 'desc' )
                ->orderBy( 'deltas.platform_id', 'asc' )
                ->orderBy( 'flights.ring_id', 'asc' )
                ->paginate( 100 );

        $current_delta = 0;
            
        return view( 'backstage.build.show', compact( 'build', 'flights', 'current_delta' ) );
    }

    public function delete( Build $build ) {
        return view( 'backstage.build.delete', compact( 'build' ) );
    }

    public function store() {
        Build::create( request( ['id', 'milestone_id'] ) );

        return redirect()->route( 'manageBuild' );
    }

    public function patch() {
        $build = Build::find( request( 'id' ) );
        $milestone->fill( request()->only( ['milestone_id'] ) )->save();

        return redirect()->route( 'showBuild', ['id' => request( 'id' )] );
    }

    public function destroy() {
        Build::destroy( request( 'id' ) );

        return redirect()->route( 'manageBuild' );
    }
}
