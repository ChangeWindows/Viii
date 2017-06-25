@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>Edit release {{ $release->string }} for {{ $release->platform_name }} in {{ $release->ring_name }}</h1>
    <form method="POST" action="{{ route('patchRelease') }}">
        {!! method_field('patch') !!}
        {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" aria-describedby="id" value="{{ $release->id }}">
        <div class="form-group">
            <label for="build_id">Build</label>
            <input type="number" class="form-control" id="build_id" name="build_id" aria-describedby="build_id" placeholder="Build" value="{{ $release->build_id }}">
        </div>
        <div class="form-group">
            <label for="build_string">String</label>
            <input type="text" class="form-control" id="build_string" name="build_string" aria-describedby="build_string" placeholder="Build string" value="{{ $release->build_string }}">
        </div>
        <div class="form-group">
            <label for="platform">Platform</label>
            <input type="number" class="form-control" id="platform" name="platform" aria-describedby="platform" placeholder="Platform" value="{{ $release->platform }}">
        </div>
        <div class="form-group">
            <label for="ring">Ring</label>
            <input type="number" class="form-control" id="ring" name="ring" aria-describedby="ring" placeholder="Ring" value="{{ $release->ring }}">
        </div>
        <div class="form-group">
            <label for="release">Date</label>
            <input type="date" class="form-control" id="release" name="release" aria-describedby="release" placeholder="Date" value="{{ $release->release }}">
        </div>
        <button type="submit" class="btn btn-primary">Update release</button>
    </form>
</div>
@endsection