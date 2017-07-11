<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;
use App\Build;

class TimelineController extends Controller
{
    public function __construct()
    {
    }
    
    public function index() {
        $releases = Release::paginate( 100 );

        return view( 'timeline.index', compact( 'releases' ) );
    }
}
