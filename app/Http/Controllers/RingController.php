<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ring;

class RingController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    public function index() {
        $rings = Ring::all();

        return view( 'backstage.ring.index', compact( 'rings' ) );
    }

    public function create() {
        return view( 'backstage.ring.create' );
    }

    public function edit( Ring $ring ) {
        return view( 'backstage.ring.edit', compact( 'ring' ) );
    }

    public function delete( Ring $ring ) {
        return view( 'backstage.ring.delete', compact( 'ring' ) );
    }

    public function store() {
        Ring::create( request( ['default_name', 'default_short', 'default_acronym', 'xbox_name', 'xbox_short', 'xbox_acronym', 'other_name', 'other_short', 'other_acronym'] ) );

        return redirect()->route( 'manageRing' );
    }

    public function patch() {
        $ring = Ring::find( request( 'id' ) );

        $ring->default_name = request( 'default_name' );
        $ring->default_short = request( 'default_short' );
        $ring->default_acronym = request( 'default_acronym' );
        $ring->xbox_name = request( 'xbox_name' );
        $ring->xbox_short = request( 'xbox_short' );
        $ring->xbox_acronym = request( 'xbox_acronym' );
        $ring->other_name = request( 'other_name' );
        $ring->other_short = request( 'other_short' );
        $ring->other_acronym = request( 'other_acronym' );

        $ring->save();

        return redirect()->route( 'manageRing' );
    }

    public function destroy() {
        Ring::destroy( request( 'id' ) );

        return redirect()->route( 'manageRing' );
    }
}