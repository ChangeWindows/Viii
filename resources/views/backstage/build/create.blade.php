@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>New build</h1>
    <form method="POST" action="{{ route('storeBuild') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="id">Build</label>
            <input type="number" class="form-control" id="id" name="id" aria-describedby="build" placeholder="Build">
        </div>
        <div class="form-group">
            <label for="milestone">Milestone</label>
            <input type="text" class="form-control" id="milestone" name="milestone_id" aria-describedby="milestone" placeholder="Milestone">
        </div>
        <button type="submit" class="btn btn-primary">Add build</button>
    </form>
</div>
@endsection