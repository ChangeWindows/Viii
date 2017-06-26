<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;

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

    public function create() {
        return view( 'backstage.release.create' );
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

        $release->id = request( 'id' );

        $release->save();

        return redirect()->route( 'manageRelease' );
    }

    public function destroy() {
        Release::destroy( request( 'id' ) );

        return redirect()->route( 'manageRelease' );
    }
}