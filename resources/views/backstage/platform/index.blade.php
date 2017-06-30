@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        Platforms
        <a href="{{ route('createPlatform') }}" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> New platform</a>
    </h1>
</div>
@foreach ( $platforms as $platform )
    <div class="col-md-3">
        <a href="{{ route('editPlatform', ['id' => $platform->id]) }}">{{ $platform->name }}</a>
        <a class="pull-right" href="{{ route('deletePlatform', ['id' => $platform->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
    </div>
@endforeach
@endsection