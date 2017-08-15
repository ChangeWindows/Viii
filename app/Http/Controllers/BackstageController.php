<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackstageController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    public function index() {
        return view( 'backstage.index' );
    }
    
    public function settings() {
        return view( 'backstage.settings' );
    }
}
