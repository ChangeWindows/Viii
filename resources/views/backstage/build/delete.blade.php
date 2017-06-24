@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>Delete build {{ $build->build }}</h1>
</div>
<form method="POST" action="{{ route('destroyBuild') }}">
    {!! method_field('delete') !!}
    {{ csrf_field() }}
    <input type="hidden" id="id" name="id" value="{{ $build->id }}">
    <button type="submit" class="btn btn-primary">Delete build</button>
</form>
@endsection