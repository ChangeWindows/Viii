@extends('layouts.backstage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Delete build {{ $build->build }}</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('buildsDestroy') }}">
        {!! method_field('delete') !!}
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="{{ $build->id }}">
        <button type="submit" class="btn btn-primary">Delete build</button>
    </form>
</div>
@endsection