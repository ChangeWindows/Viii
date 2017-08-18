<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delta;
use App\Build;
use App\Flight;
use Carbon\Carbon;

class FlightController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    public function create( Build $build ) {
        return view( 'backstage.flight.create', compact( 'build' ) );
    }

    public function edit( Flight $flight ) {
        return view( 'backstage.flight.edit', compact( 'flight' ) );
    }

    public function delete( Flight $flight ) {
        return view( 'backstage.flight.delete', compact( 'flight' ) );
    }

    public function store() {
        $string = Delta::splitString( request()->get( 'build_string' ) );

        foreach( request()->get( 'delta' ) as $platform => $ring ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'changelog'] ), array( 'platform_id' => $platform, 'major' => $string['major'], 'minor' => $string['minor'], 'build' => $string['build'], 'delta' => $string['delta'] ) ) );

            foreach( $ring as $key => $value ) {
                Flight::create( ['release' => request( 'release' ), 'ring_id' => $value, 'delta_id' => $delta->id] );
            }
        }

        return redirect()->route( 'showBuild', ['id' => request( 'build_id' )] );
    }

    public function patch() {
        $delta = Delta::find( request( 'id' ) );

        $string = Delta::splitString( request()->get( 'build_string' ) );

        $delta->fill( array_merge( request()->only( ['build_string', 'platform', 'ring', 'release', 'changelog'] ), array( 'major' => $string['major'], 'minor' => $string['minor'], 'build' => $string['build'], 'delta' => $string['delta'] ) ) )->save();

        return redirect()->route( 'showBuild', ['id' => request( 'build_id' )] );
    }

    public function destroy() {
        Delta::destroy( request( 'id' ) );

        return redirect()->route( 'manageDelta' );
    }
}
