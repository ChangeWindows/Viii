<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Milestone;

class MilestoneController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    public function index() {
        $milestones = Milestone::orderBy('version', 'desc')->paginate( 100 );
        
        return view( 'backstage.milestone.index', compact( 'milestones' ) );
    }

    public function edit( Milestone $milestone ) {
        return view( 'backstage.milestone.edit', compact( 'milestone' ) );
    }

    public function delete( Milestone $milestone ) {
        return view( 'backstage.milestone.delete', compact( 'milestone' ) );
    }

    public function store() {
        Milestone::create( request( ['id', 'os', 'name', 'codename', 'short', 'version', 'color', 'description'] ) );

        return redirect()->route( 'manageMilestone' );
    }

    public function patch() {
        $milestone = Milestone::find( request( 'id' ) );
        $milestone->fill( request()->only( ['os', 'name', 'codename', 'short', 'version', 'color', 'description'] ) )->save();

        return redirect()->route( 'manageMilestone' );
    }

    public function destroy() {
        Milestone::destroy( request( 'id' ) );

        return redirect()->route( 'manageMilestone' );
    }
}
