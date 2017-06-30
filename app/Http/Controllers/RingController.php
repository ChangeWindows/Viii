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
        Ring::create( request( ['name', 'short', 'acronym'] ) );

        return redirect()->route( 'manageRing' );
    }

    public function patch() {
        $ring = Ring::find( request( 'id' ) );

        $ring->id = request( 'id' );

        $ring->save();

        return redirect()->route( 'manageRing' );
    }

    public function destroy() {
        Ring::destroy( request( 'id' ) );

        return redirect()->route( 'manageRing' );
    }
}