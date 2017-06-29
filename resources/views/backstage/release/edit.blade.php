@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('patchRelease') }}" class="row">
        <div class="col-12">
            <h1>
                Edit {{ $release->getString() }} for {{ $release->getPlatformName() }} in {{ $release->getRingName() }}
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-check"></i> Save</button>
            </h1>
        </div>
        {!! method_field('patch') !!}
        {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" aria-describedby="id" value="{{ $release->id }}">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="build_id">Build</label>
                <input type="number" class="form-control" id="build_id" name="build_id" aria-describedby="build_id" placeholder="Build" value="{{ $release->build_id }}">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="build_string">String</label>
                <input type="text" class="form-control" id="build_string" name="build_string" aria-describedby="build_string" placeholder="Build string" value="{{ $release->getString( 'full' ) }}">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="platform">Platform</label>
                <input type="number" class="form-control" id="platform" name="platform" aria-describedby="platform" placeholder="Platform" value="{{ $release->platform }}">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="ring">Ring</label>
                <input type="number" class="form-control" id="ring" name="ring" aria-describedby="ring" placeholder="Ring" value="{{ $release->ring }}">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="release">Date</label>
                <input type="date" class="form-control" id="release" name="release" aria-describedby="release" placeholder="Date" value="{{ $release->release }}">
            </div>
        </div>
    </form>
</div>
@endsection