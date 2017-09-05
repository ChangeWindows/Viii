<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Delta;
use App\Build;

class TimelineController extends Controller
{
    public function __construct()
    {
    }
    
    public function index() {
        return view( 'timeline.index' );
    }
}
