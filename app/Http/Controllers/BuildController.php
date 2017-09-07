<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Build;
use App\Milestone;

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
        $string = Build::splitString( request()->get( 'build_string' ) );
        $date = request( ['release'] )['release'];
        $milestone = Milestone::getMilestoneByString( $string );
        
        foreach( request()->get( 'flight' ) as $platform => $ring ) {
            $flight = [ 'vnext' => null, 'skip' => null, 'fast' => null, 'slow' => null, 'preview' => null, 'release' => null, 'pilot' => null, 'broead' => null, 'lts' => null ];

            foreach( $ring as $key => $value ) {
                if ( isset( $value ) )
                    $flight[$key] = $date;
            }
            
            Build::create( array_merge(
                request()->only( ['milestone_id', 'changelog'] ),
                array( 'platform_id' => $platform, 'milestone_id' => $milestone, 'major' => $string['major'], 'minor' => $string['minor'], 'build' => $string['build'], 'delta' => $string['delta'], 'vnext' => $flight['vnext'], 'skip' => $flight['skip'], 'fast' => $flight['fast'], 'slow' => $flight['slow'], 'preview' => $flight['preview'], 'release' => $flight['release'], 'pilot' => $flight['pilot'], 'broad' => $flight['broad'], 'lts' => $flight['lts'] )
            ) );
        }

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
