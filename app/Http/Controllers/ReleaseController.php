<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;
use App\Build;

class ReleaseController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    public function index() {
        $releases = Release::paginate( 100 );

        return view( 'backstage.release.index', compact( 'releases' ) );
    }

    public function create( Build $build ) {
        return view( 'backstage.release.create', compact( 'build' ) );
    }

    public function edit( Release $release ) {
        return view( 'backstage.release.edit', compact( 'release' ) );
    }

    public function delete( Release $release ) {
        return view( 'backstage.release.delete', compact( 'release' ) );
    }

    public function promote( Release $release ) {
        Release::create([
            'build_id'      => $release->build_id,
            'build_string'  => $release->build_string,
            'platform'      => $release->platform,
            'ring'          => $release->ring + 1,
            'release'       => $release->release
        ]);

        return redirect()->route( 'showBuild', ['id' => $release->build_id] );
    }

    public function store() {
        if ( request ( ['pc_leak'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 1 ) ) );
        if ( request ( ['pc_fast'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 2 ) ) );
        if ( request ( ['pc_slow'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 4 ) ) );
        if ( request ( ['pc_preview'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 5 ) ) );
        if ( request ( ['pc_pilot'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 6 ) ) );
        if ( request ( ['pc_broad'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 7 ) ) );
        if ( request ( ['pc_lts'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 1, 'ring' => 8 ) ) );

        if ( request ( ['mobile_leak'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 1 ) ) );
        if ( request ( ['mobile_fast'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 2 ) ) );
        if ( request ( ['mobile_slow'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 3 ) ) );
        if ( request ( ['mobile_preview'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 5 ) ) );
        if ( request ( ['mobile_pilot'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 6 ) ) );
        if ( request ( ['mobile_broad'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 2, 'ring' => 7 ) ) );

        if ( request ( ['xbox_leak'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 1 ) ) );
        if ( request ( ['xbox_fast'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 2 ) ) );
        if ( request ( ['xbox_slow'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 3 ) ) );
        if ( request ( ['xbox_preview'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 4 ) ) );
        if ( request ( ['xbox_release'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 5 ) ) );
        if ( request ( ['xbox_pilot'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 3, 'ring' => 6 ) ) );

        if ( request ( ['server_leak'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 4, 'ring' => 1 ) ) );
        if ( request ( ['server_slow'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 4, 'ring' => 4 ) ) );
        if ( request ( ['server_broad'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 4, 'ring' => 7 ) ) );
        if ( request ( ['server_lts'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 4, 'ring' => 8 ) ) );

        if ( request ( ['iot_leak'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 5, 'ring' => 1 ) ) );
        if ( request ( ['iot_slow'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 5, 'ring' => 4 ) ) );
        if ( request ( ['iot_pilot'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 5, 'ring' => 6 ) ) );
        if ( request ( ['iot_broad'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 5, 'ring' => 7 ) ) );

        if ( request ( ['reality_leak'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 1 ) ) );
        if ( request ( ['reality_slow'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 4 ) ) );
        if ( request ( ['reality_pilot'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 6 ) ) );
        if ( request ( ['reality_broad'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 7 ) ) );
        if ( request ( ['reality_lts'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 6, 'ring' => 8 ) ) );

        if ( request ( ['team_leak'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 7, 'ring' => 1 ) ) );
        if ( request ( ['team_slow'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 7, 'ring' => 4 ) ) );
        if ( request ( ['team_pilot'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 7, 'ring' => 6 ) ) );
        if ( request ( ['team_broad'] ) )
            Release::create( array_merge( request()->only( ['build_id', 'build_string', 'release'] ), array( 'platform' => 7, 'ring' => 7 ) ) );

        return redirect()->route( 'showBuild', ['id' => request( 'build_id' )] );
    }

    public function patch() {
        $release = Release::find( request( 'id' ) );
        $milestone->fill( request()->only( ['build_string', 'platform', 'ring', 'release'] ) )->save();

        return redirect()->route( 'showBuild', ['id' => request( 'build_id' )] );
    }

    public function destroy() {
        Release::destroy( request( 'id' ) );

        return redirect()->route( 'manageRelease' );
    }
}