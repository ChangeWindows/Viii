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
        Release::create( request( ['build_id', 'build_string', 'platform', 'ring', 'release'] ) );

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