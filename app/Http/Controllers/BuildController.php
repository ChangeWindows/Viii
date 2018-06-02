<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Build;
use App\Milestone;

class BuildController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    public function index() {
        $builds = Build::orderBy( 'build', 'desc' )
                ->orderBy( 'platform_id', 'asc' )
                ->orderBy( 'milestone_id', 'desc' )
                ->paginate( 100 );

        $current_milestone = "";

        return view( 'backstage.build.index', compact( 'builds', 'current_milestone' ) );
    }

    public function show( Build $build ) {
        return view( 'backstage.build.show', compact( 'build' ) );
    }

    public function delete( Build $build ) {
        return view( 'backstage.build.delete', compact( 'build' ) );
    }

    public function store() {
        $string = Build::splitString( request()->get( 'build_string' ) );
        $date = request( ['release'] )['release'];
        $milestone = Milestone::getMilestoneByString( $string );
        
        foreach( request()->get( 'flight' ) as $platform => $ring ) {
            $flight = [ 'vnext' => null, 'skip' => null, 'fast' => null, 'slow' => null, 'preview' => null, 'release' => null, 'targeted' => null, 'broad' => null, 'lts' => null ];

            foreach( $ring as $key => $value ) {
                if ( isset( $value ) )
                    $flight[$key] = $date;
            }
            
            Build::create( array_merge(
                request()->only( ['milestone_id'] ),
                array( 'platform_id' => $platform, 'milestone_id' => $milestone, 'major' => $string['major'], 'minor' => $string['minor'], 'build' => $string['build'], 'delta' => $string['delta'], 'vnext' => $flight['vnext'], 'skip' => $flight['skip'], 'fast' => $flight['fast'], 'slow' => $flight['slow'], 'preview' => $flight['preview'], 'release' => $flight['release'], 'targeted' => $flight['targeted'], 'broad' => $flight['broad'], 'lts' => $flight['lts'] )
            ) );
        }

        return redirect()->route( 'manageBuild' );
    }

    public function patch() {
        $build = Build::find( request( 'id' ) );
        $milestone->fill( request()->only( ['milestone_id'] ) )->save();

        return redirect()->route( 'showBuild', ['id' => request( 'id' )] );
    }

    public function destroy() {
        Build::destroy( request( 'id' ) );

        return redirect()->route( 'manageBuild' );
    }
    
    public function promoteNow( Build $build ) {
        /* This isn't a simple +1 math exercise
        * 1 PC      0 => 1 => 2 => 3 =>      5 => 6 => 7 => 8
        * 2 Mobile  0 =>                          6 => 7
        * 3 Xbox    0 =>      2 => 3 => 4 => 5 => 6
        * 4 Server  0 =>           3 =>           6 => 7 => 8
        * 5 Holo    0 =>      2 => 3 =>           6 => 7 => 8
        * 6 IoT     0 =>           3 =>           6 => 7
        * 7 Team    0 =>                          6 => 7
        * 8 SDK                                   6
        * 9 ISO                                   6
        */

        // TODO: Update PromoteNow() function for all platforms to reflect this
        $build->promoteNow();
        $build->save();

        return redirect()->route( 'manageBuild' );
    }
}
