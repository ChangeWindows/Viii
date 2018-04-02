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
        Milestone::create( request( ['id', 'os', 'name', 'codename', 'short', 'version', 'color', 'description', 'preview', 'release', 'extension', 'mainstream', 'extended', 'pc_next', 'pc_fast', 'pc_slow', 'pc_release', 'pc_targeted', 'pc_broad', 'pc_lts', 'mobile_next', 'mobile_fast', 'mobile_slow', 'mobile_release', 'mobile_targeted', 'mobile_broad', 'server_next', 'server_slow', 'server_targeted', 'server_broad', 'server_lts', 'xbox_next', 'xbox_fast', 'xbox_slow', 'xbox_preview', 'xbox_release', 'xbox_targeted', 'iot_next', 'iot_slow', 'iot_targeted', 'iot_broad', 'holographic_next', 'holographic_slow', 'holographic_targeted', 'holographic_broad', 'holographic_lts', 'team_next', 'team_slow', 'team_release', 'team_targeted', 'team_broad'] ) );
        
        return redirect()->route( 'manageMilestone' );
    }

    public function patch() {
        $milestone = Milestone::find( request( 'id' ) );
        $milestone->fill( request()->only( ['os', 'name', 'codename', 'short', 'version', 'color', 'description', 'preview', 'release', 'extension', 'mainstream', 'extended', 'pc_next', 'pc_fast', 'pc_slow', 'pc_release', 'pc_targeted', 'pc_broad', 'pc_lts', 'mobile_next', 'mobile_fast', 'mobile_slow', 'mobile_release', 'mobile_targeted', 'mobile_broad', 'server_next', 'server_slow', 'server_targeted', 'server_broad', 'server_lts', 'xbox_next', 'xbox_fast', 'xbox_slow', 'xbox_preview', 'xbox_release', 'xbox_targeted', 'iot_next', 'iot_slow', 'iot_targeted', 'iot_broad', 'holographic_next', 'holographic_slow', 'holographic_targeted', 'holographic_broad', 'holographic_lts', 'team_next', 'team_slow', 'team_release', 'team_targeted', 'team_broad'] ) )->save();

        return redirect()->route( 'manageMilestone' );
    }

    public function destroy() {
        Milestone::destroy( request( 'id' ) );

        return redirect()->route( 'manageMilestone' );
    }
}
