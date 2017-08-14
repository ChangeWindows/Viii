@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>Delete {{ $milestone->name }}</h1>
    <form method="POST" action="{{ route('destroyMilestone') }}">
        {!! method_field('delete') !!}
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="{{ $milestone->id }}">
        <button type="submit" class="btn btn-primary"><i class="fal fa-fw fa-trash-alt"></i> Delete milestone</button>
    </form>
</div>
@endsection