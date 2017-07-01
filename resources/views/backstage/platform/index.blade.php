@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        Platforms
        <a href="{{ route('createPlatform') }}" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> New platform</a>
    </h1>
</div>
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $platforms as $platform )
            <div class="col-md-3">
                <div class="row list-bar">
                    <a class="col-10 list-bar-item list-bar-default" href="{{ route('editPlatform', ['id' => $platform->id]) }}">{{ $platform->name }}</a>
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{  route('deletePlatform', ['id' => $platform->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection