<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Platform;

class PlatformController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    public function index() {
        $platforms = Platform::all();

        return view( 'backstage.platform.index', compact( 'platforms' ) );
    }

    public function create() {
        return view( 'backstage.platform.create' );
    }

    public function edit( Platform $platform ) {
        return view( 'backstage.platform.edit', compact( 'platform' ) );
    }

    public function delete( Platform $platform ) {
        return view( 'backstage.platform.delete', compact( 'platform' ) );
    }

    public function store() {
        Platform::create( request( ['name'] ) );

        return redirect()->route( 'managePlatform' );
    }

    public function patch() {
        $platform = Platform::find( request( 'id' ) );
        $milestone->fill( request()->only( ['name'] ) )->save();

        return redirect()->route( 'managePlatform' );
    }

    public function destroy() {
        Platform::destroy( request( 'id' ) );

        return redirect()->route( 'managePlatform' );
    }
}