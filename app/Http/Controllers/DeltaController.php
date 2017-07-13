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
        if ( request( ['pc_leak', 'pc_fast', 'pc_slow', 'pc_preview', 'pc_pilot', 'pc_broad', 'pc_lts'] ) ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'changelog'] ), array( 'platform_id' => 1 ) ) );

            if ( request( ['pc_leak'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 1, 'delta_id' => $delta->id ) ) );
            if ( request( ['pc_fast'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 2, 'delta_id' => $delta->id ) ) );
            if ( request( ['pc_slow'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 4, 'delta_id' => $delta->id ) ) );
            if ( request( ['pc_preview'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 5, 'delta_id' => $delta->id ) ) );
            if ( request( ['pc_pilot'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 6, 'delta_id' => $delta->id ) ) );
            if ( request( ['pc_broad'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 7, 'delta_id' => $delta->id ) ) );
            if ( request( ['pc_lts'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 8, 'delta_id' => $delta->id ) ) );
        }

        if ( request( ['mobile_leak', 'mobile_fast', 'mobile_slow', 'mobile_preview', 'mobile_pilot', 'mobile_broad'] ) ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'changelog'] ), array( 'platform_id' => 2 ) ) );

            if ( request( ['mobile_leak'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 1, 'delta_id' => $delta->id ) ) );
            if ( request( ['mobile_fast'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 2, 'delta_id' => $delta->id ) ) );
            if ( request( ['mobile_slow'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 3, 'delta_id' => $delta->id ) ) );
            if ( request( ['mobile_preview'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 5, 'delta_id' => $delta->id ) ) );
            if ( request( ['mobile_pilot'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 6, 'delta_id' => $delta->id ) ) );
            if ( request( ['mobile_broad'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 7, 'delta_id' => $delta->id ) ) );
        }

        if ( request( ['xbox_leak', 'xbox_fast', 'xbox_slow', 'xbox_preview', 'xbox_release', 'xbox_pilot'] ) ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'changelog'] ), array( 'platform_id' => 3 ) ) );

            if ( request( ['xbox_leak'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 1, 'delta_id' => $delta->id ) ) );
            if ( request( ['xbox_fast'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 2, 'delta_id' => $delta->id ) ) );
            if ( request( ['xbox_slow'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 3, 'delta_id' => $delta->id ) ) );
            if ( request( ['xbox_preview'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 4, 'delta_id' => $delta->id ) ) );
            if ( request( ['xbox_release'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 5, 'delta_id' => $delta->id ) ) );
            if ( request( ['xbox_pilot'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 6, 'delta_id' => $delta->id ) ) );
        }

        if ( request( ['server_leak', 'server_slow', 'server_broad', 'server_lts'] ) ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'changelog'] ), array( 'platform_id' => 4 ) ) );

            if ( request( ['server_leak'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 1, 'delta_id' => $delta->id ) ) );
            if ( request( ['server_slow'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 4, 'delta_id' => $delta->id ) ) );
            if ( request( ['server_broad'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 7, 'delta_id' => $delta->id ) ) );
            if ( request( ['server_lts'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 8, 'delta_id' => $delta->id ) ) );

        }

        if ( request( ['iot_leak', 'iot_slow', 'iot_pilot', 'iot_broad'] ) ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'changelog'] ), array( 'platform_id' => 5 ) ) );

            if ( request( ['iot_leak'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 1, 'delta_id' => $delta->id ) ) );
            if ( request( ['iot_slow'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 4, 'delta_id' => $delta->id ) ) );
            if ( request( ['iot_pilot'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 6, 'delta_id' => $delta->id ) ) );
            if ( request( ['iot_broad'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 7, 'delta_id' => $delta->id ) ) );
        }

        if ( request( ['reality_leak', 'reality_slow', 'reality_pilot', 'reality_broad', 'reality_lts'] ) ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'changelog'] ), array( 'platform_id' => 6 ) ) );

            if ( request( ['reality_leak'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 1, 'delta_id' => $delta->id ) ) );
            if ( request( ['reality_slow'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 4, 'delta_id' => $delta->id ) ) );
            if ( request( ['reality_pilot'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 6, 'delta_id' => $delta->id ) ) );
            if ( request( ['reality_broad'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 7, 'delta_id' => $delta->id ) ) );
            if ( request( ['reality_lts'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 8, 'delta_id' => $delta->id ) ) );
        }

        if ( request( ['team_leak', 'team_slow', 'team_pilot', 'team_broad'] ) ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'build_string', 'changelog'] ), array( 'platform_id' => 7 ) ) );

            if ( request( ['team_leak'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 1, 'delta_id' => $delta->id ) ) );
            if ( request( ['team_slow'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 4, 'delta_id' => $delta->id ) ) );
            if ( request( ['team_pilot'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 6, 'delta_id' => $delta->id ) ) );
            if ( request( ['team_broad'] ) )
                Flight::create( array_merge( request()->only( ['release'] ), array( 'ring_id' => 7, 'delta_id' => $delta->id ) ) );
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