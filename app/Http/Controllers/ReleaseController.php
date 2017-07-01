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

    public function store() {
        Release::create( request( ['build_id', 'build_string', 'platform', 'ring'] ) );

        return redirect()->route( 'manageRelease' );
    }

    public function patch() {
        $release = Release::find( request( 'id' ) );

        $release->build_string = request( 'build_string' );
        $release->platform = request( 'platform' );
        $release->ring = request( 'ring' );

        $release->save();

        return redirect()->route( 'manageRelease' );
    }

    public function destroy() {
        Release::destroy( request( 'id' ) );

        return redirect()->route( 'manageRelease' );
    }
}