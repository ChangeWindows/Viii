<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delta;
use App\Build;
use App\Flight;

class DeltaController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    public function index() {
        $deltas = Delta::paginate( 100 );

        return view( 'backstage.delta.index', compact( 'deltas' ) );
    }

    public function create( Build $build ) {
        return view( 'backstage.delta.create', compact( 'build' ) );
    }

    public function edit( Delta $delta ) {
        return view( 'backstage.delta.edit', compact( 'delta' ) );
    }

    public function delete( Delta $delta ) {
        return view( 'backstage.delta.delete', compact( 'delta' ) );
    }

    public function promote( Delta $delta ) {
        /* This can't be a simple +1
         * 1 PC      1 => 2 => 3 => 5 => 6 => 7 => 8
         * 2 Mobile  1 => 2 => 3 => 5 => 6 => 7
         * 2 Xbox    1 => 2 => 3 => 4 => 5 => 6
         * 2 Server  1 => 3 => 7 => 8
         * 2 Mixed   1 => 6 => 7 => 8
         * 2 IoT     1 => 3 => 6 => 7
         * 2 Team    1 => 6 => 7
         */

        Delta::create([
            'build_id'      => $delta->build_id,
            'build_string'  => $delta->build_string,
            'platform_id'    => $delta->platform,
            'ring_id'        => $delta->ring + 1
        ]);

        return redirect()->route( 'showBuild', ['id' => $delta->build_id] );
    }

    public function store() {
        foreach( request()->get( 'delta' ) as $platform => $ring ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'changelog'] ), array( 'platform_id' => $platform ) ) );

            foreach( $ring as $key => $value ) {
                Flight::create( ['release' => request( 'release' ), 'ring_id' => $value, 'delta_id' => $delta->id] );
            }
        }

        return redirect()->route( 'showBuild', ['id' => request( 'build_id' )] );
    }

    public function patch() {
        $delta = Delta::find( request( 'id' ) );
        $milestone->fill( request()->only( ['build_string', 'platform', 'ring', 'release'] ) )->save();

        return redirect()->route( 'showBuild', ['id' => request( 'build_id' )] );
    }

    public function destroy() {
        Delta::destroy( request( 'id' ) );

        return redirect()->route( 'manageDelta' );
    }
}