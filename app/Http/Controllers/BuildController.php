<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Build;
use App\Delta;

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
        $deltas = Delta::where( 'build_id', $build->id )
                ->orderBy( 'platform', 'asc' )
                ->orderBy( 'build_string', 'desc' )
                ->orderBy( 'ring', 'desc' )
                ->paginate( 100 );

        $current_platform = 0;
            
        return view( 'backstage.build.show', compact( 'build', 'deltas', 'current_platform' ) );
    }

    public function create() {
        return view( 'backstage.build.create');
    }

    public function edit( Build $build ) {
        return view( 'backstage.build.edit', compact( 'build' ) );
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
