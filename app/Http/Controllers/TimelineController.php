<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delta;
use App\Build;

class TimelineController extends Controller
{
    public function __construct()
    {
    }
    
    public function index() {
        $deltas = Delta::orderBy( 'release', 'desc' )->paginate( 100 );

        return view( 'timeline.index', compact( 'deltas' ) );
    }
}
