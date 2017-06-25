@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>New release</h1>
    <form method="POST" action="{{ route('storeRelease') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="build_id">Build</label>
            <input type="number" class="form-control" id="build_id" name="build_id" aria-describedby="build_id" placeholder="Build">
        </div>
        <div class="form-group">
            <label for="build_string">String</label>
            <input type="text" class="form-control" id="build_string" name="build_string" aria-describedby="build_string" placeholder="Build string">
        </div>
        <div class="form-group">
            <label for="platform">Platform</label>
            <input type="number" class="form-control" id="platform" name="platform" aria-describedby="platform" placeholder="Platform">
        </div>
        <div class="form-group">
            <label for="ring">Ring</label>
            <input type="number" class="form-control" id="ring" name="ring" aria-describedby="ring" placeholder="Ring">
        </div>
        <div class="form-group">
            <label for="release">Date</label>
            <input type="date" class="form-control" id="release" name="release" aria-describedby="release" placeholder="Date">
        </div>
        <button type="submit" class="btn btn-primary">Add release</button>
    </form>
</div>
@endsection