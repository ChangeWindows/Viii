@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        Releases
        <a href="{{ route('createRing') }}" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> New ring</a>
    </h1>
</div>
@foreach ( $rings as $ring )
    <div class="col-md-3">
        <a href="{{ route('editRing', ['id' => $ring->id]) }}">{{ $ring->name }}</a>
        <a class="pull-right" href="{{ route('deleteRing', ['id' => $ring->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
    </div>
@endforeach
@endsection