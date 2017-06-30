@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>Delete {{ $ring->name }}</h1>
    <form method="POST" action="{{ route('destroyRing') }}">
        {!! method_field('delete') !!}
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="{{ $ring->id }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i> Delete ring</button>
    </form>
</div>
@endsection