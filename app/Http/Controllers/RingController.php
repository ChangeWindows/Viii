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
        $ring->fill( request()->only( ['default_name', 'default_short', 'default_acronym', 'xbox_name', 'xbox_short', 'xbox_acronym', 'other_name', 'other_short', 'other_acronym'] ) )->save();

        return redirect()->route( 'manageRing' );
    }

    public function destroy() {
        Ring::destroy( request( 'id' ) );

        return redirect()->route( 'manageRing' );
    }
}