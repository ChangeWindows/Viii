@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>Edit build {{ $build->id }}</h1>
</div>
<form method="POST" action="{{ route('patchBuild') }}">
    {!! method_field('patch') !!}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="id">Build</label>
        <input type="number" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Build" value="{{ $build->id }}">
    </div>
    <div class="form-group">
        <label for="milestone">Milestone</label>
        <input type="text" class="form-control" id="milestone" name="milestone_id" aria-describedby="milestone" placeholder="Milestone" value="{{ $build->milestone_id }}">
    </div>
    <button type="submit" class="btn btn-primary">Update build</button>
</form>
@endsection