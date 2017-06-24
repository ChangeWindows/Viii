<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Build;

class BuildController extends Controller
{
    public function index() {
        $builds = Build::paginate(100);

        return view('backstage.build.index', compact('builds'));
    }

    public function create() {
        return view('backstage.build.create');
    }

    public function edit(Build $build) {
        return view('backstage.build.edit', compact('build'));
    }

    public function delete(Build $build) {
        return view('backstage.build.delete', compact('build'));
    }

    public function store() {
        Build::create(request(['id', 'milestone_id']));

        return redirect()->route('manageBuild');
    }

    public function patch() {
        $build = Build::find(request('id'));

        $build->milestone_id = request('milestone_id');

        $build->save();

        return redirect()->route('manageBuild');
    }

    public function destroy() {
        Build::destroy(request('id'));

        return redirect()->route('manageBuild');
    }
}
