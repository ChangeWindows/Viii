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

    public function create() {
        return view( 'backstage.milestone.create' );
    }

    public function edit( Milestone $milestone ) {
        return view( 'backstage.milestone.edit', compact( 'milestone' ) );
    }

    public function delete( Milestone $milestone ) {
        return view( 'backstage.milestone.delete', compact( 'milestone' ) );
    }

    public function store() {
        Milestone::create( request( ['id', 'os', 'name', 'codename', 'version', 'color', 'description'] ) );

        return redirect()->route( 'manageMilestone' );
    }

    public function patch() {
        $milestone = Milestone::find( request( 'id' ) );

        $milestone->id = request( 'id' );
        $milestone->os = request( 'os' );
        $milestone->name = request( 'name' );
        $milestone->codename = request( 'codename' );
        $milestone->version = request( 'version' );
        $milestone->color = request( 'color' );
        $milestone->description = request( 'description' );

        $milestone->save();

        return redirect()->route( 'manageMilestone' );
    }

    public function destroy() {
        Milestone::destroy( request( 'id' ) );

        return redirect()->route( 'manageMilestone' );
    }
}
