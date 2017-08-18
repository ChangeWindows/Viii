@extends('layouts.backstage')

@section('jumbotron')
<h1>Delete {{ $milestone->name }}</h1>
@endsection

@section('toolbar')
<form method="POST" action="{{ route('destroyMilestone') }}">
    {!! method_field('delete') !!}
    {{ csrf_field() }}
    <input type="hidden" id="id" name="id" value="{{ $milestone->id }}">
    <button type="submit" class="btn btn-default"><i class="fal fa-fw fa-trash-alt"></i> Delete milestone</button>
</form>
@endsection

@section('content')
<div class="col text-center">
    <h2 class="h2-delete">What?</h3>
    <h3 class="h3-delete">We're only here to confirm the deletion of a milestone, you don't need any content.</h4>
    <h4 class="h4-delete">Weirdo</h5>
</div>
@endsection