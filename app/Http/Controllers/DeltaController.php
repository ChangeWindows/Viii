<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delta;
use App\Build;

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
        Delta::create([
            'build_id'      => $delta->build_id,
            'build_string'  => $delta->build_string,
            'platform'      => $delta->platform,
            'ring'          => $delta->ring + 1,
            'release'       => $delta->release
        ]);

        return redirect()->route( 'showBuild', ['id' => $delta->build_id] );
    }

    public function store() {
        if ( request ( ['pc_leak'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 1 ) ) );
        if ( request ( ['pc_fast'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 2 ) ) );
        if ( request ( ['pc_slow'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 4 ) ) );
        if ( request ( ['pc_preview'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 5 ) ) );
        if ( request ( ['pc_pilot'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 6 ) ) );
        if ( request ( ['pc_broad'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 7 ) ) );
        if ( request ( ['pc_lts'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 8 ) ) );

        if ( request ( ['mobile_leak'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 1 ) ) );
        if ( request ( ['mobile_fast'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 2 ) ) );
        if ( request ( ['mobile_slow'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 3 ) ) );
        if ( request ( ['mobile_preview'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 5 ) ) );
        if ( request ( ['mobile_pilot'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 6 ) ) );
        if ( request ( ['mobile_broad'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 7 ) ) );

        if ( request ( ['xbox_leak'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 1 ) ) );
        if ( request ( ['xbox_fast'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 2 ) ) );
        if ( request ( ['xbox_slow'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 3 ) ) );
        if ( request ( ['xbox_preview'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 4 ) ) );
        if ( request ( ['xbox_release'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 5 ) ) );
        if ( request ( ['xbox_pilot'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 6 ) ) );

        if ( request ( ['server_leak'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 4, 'ring' => 1 ) ) );
        if ( request ( ['server_slow'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 4, 'ring' => 4 ) ) );
        if ( request ( ['server_broad'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 4, 'ring' => 7 ) ) );
        if ( request ( ['server_lts'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 4, 'ring' => 8 ) ) );

        if ( request ( ['iot_leak'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 5, 'ring' => 1 ) ) );
        if ( request ( ['iot_slow'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 5, 'ring' => 4 ) ) );
        if ( request ( ['iot_pilot'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 5, 'ring' => 6 ) ) );
        if ( request ( ['iot_broad'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 5, 'ring' => 7 ) ) );

        if ( request ( ['reality_leak'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 1 ) ) );
        if ( request ( ['reality_slow'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 4 ) ) );
        if ( request ( ['reality_pilot'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 6 ) ) );
        if ( request ( ['reality_broad'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 7 ) ) );
        if ( request ( ['reality_lts'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 8 ) ) );

        if ( request ( ['team_leak'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 7, 'ring' => 1 ) ) );
        if ( request ( ['team_slow'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 7, 'ring' => 4 ) ) );
        if ( request ( ['team_pilot'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 7, 'ring' => 6 ) ) );
        if ( request ( ['team_broad'] ) )
            Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 7, 'ring' => 7 ) ) );

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