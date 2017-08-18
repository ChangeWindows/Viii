<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delta;
use App\Build;
use App\Flight;
use Carbon\Carbon;

class DeltaController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    public function index() {
        $deltas = Delta::paginate( 100 );

        return view( 'backstage.delta.index', compact( 'deltas' ) );
    }

    public function create( Build $build ) {
        return view( 'backstage.delta.create', compact( 'build' ) );
    }

    public function edit( Delta $delta ) {
        return view( 'backstage.delta.edit', compact( 'delta' ) );
    }

    public function delete( Delta $delta ) {
        return view( 'backstage.delta.delete', compact( 'delta' ) );
    }

    public function promote( Flight $flight ) {
        $delta = Delta::find( $flight->delta_id );

        /* This isn't a simple +1 maths exercise
         * 1 PC      1 => 2 => 3 =>      5 => 6 => 7 => 8
         * 2 Mobile  1 => 2 => 3 =>      5 => 6 => 7
         * 3 Xbox    1 => 2 => 3 => 4 => 5 => 6
         * 4 Server  1 =>      3 =>                7 => 8
         * 5 Mixed   1 =>                     6 => 7 => 8
         * 6 IoT     1 =>      3 =>           6 => 7
         * 7 Team    1 =>                     6 => 7
         */

        $ring = $flight->ring_id;

        switch ( $flight->ring_id ) {
            case 1:
                switch ( $delta->platform_id ) {
                    case 4:
                    case 6:
                        $ring = 3;
                        break;
                    case 5:
                    case 7:
                        $ring = 6;
                        break;
                    default:
                        $ring = 2;
                        break;
                }
                break;
            case 2:
                $ring = 3;
                break;
            case 3:
                switch ( $delta->platform_id ) {
                    case 3:
                        $ring = 4;
                        break;
                    case 4:
                        $ring = 7;
                        break;
                    case 6:
                        $ring = 6;
                        break;
                    default:
                        $ring = 5;
                        break;
                }
                break;
            case 4:
                $ring = 5;
                break;
            case 5:
                $ring = 6;
                break;
            case 6:
                switch ( $delta->platform_id ) {
                    case 3:
                        $ring = 6;
                        break;
                    default:
                        $ring = 7;
                        break;
                }
                break;
            case 7:
                switch ( $delta->platform_id ) {
                    case 1:
                    case 4:
                    case 5:
                        $ring = 8;
                        break;
                    default:
                        $ring = 7;
                        break;
                }
                break;
            case 8:
                $ring = 8;
                break;
        }

        Flight::create([
            'release'      => Carbon::now(),
            'ring_id'      => $ring,
            'delta_id'     => $flight->delta_id
        ]);

        return redirect()->route( 'showBuild', ['id' => $delta->build_id] );
    }

    public function store() {
        $string = Delta::splitString( request()->get( 'build_string' ) );

        foreach( request()->get( 'delta' ) as $platform => $ring ) {
            $delta = Delta::create( array_merge( request()->only( ['build_id', 'changelog'] ), array( 'platform_id' => $platform, 'major' => $string['major'], 'minor' => $string['minor'], 'build' => $string['build'], 'delta' => $string['delta'] ) ) );

            foreach( $ring as $key => $value ) {
                Flight::create( ['release' => request( 'release' ), 'ring_id' => $value, 'delta_id' => $delta->id] );
            }
        }

        return redirect()->route( 'showBuild', ['id' => request( 'build_id' )] );
    }

    public function patch() {
        $delta = Delta::find( request( 'id' ) );

        $string = Delta::splitString( request()->get( 'build_string' ) );

        $delta->fill( array_merge( request()->only( ['build_string', 'platform', 'ring', 'release', 'changelog'] ), array( 'major' => $string['major'], 'minor' => $string['minor'], 'build' => $string['build'], 'delta' => $string['delta'] ) ) )->save();

        return redirect()->route( 'showBuild', ['id' => request( 'build_id' )] );
    }

    public function destroy() {
        Delta::destroy( request( 'id' ) );

        return redirect()->route( 'manageDelta' );
    }
}