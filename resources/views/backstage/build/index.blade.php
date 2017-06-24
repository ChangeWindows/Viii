@extends('layouts.backstage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Builds <a href="{{ route('createBuild') }}" class="btn btn-primary"><i class="fa fa-fw fa-cog"></i> New build</a></h1>
        </div>
    </div>
    @foreach ( $builds as $build )
        <p>
            <a href="{{ route('editBuild', ['id' => $build->id]) }}">{{ $build->id.' '.$build->milestone_id }}</a> &middot; <a href="{{ route('deleteBuild', ['id' => $build->id]) }}">Delete</a>
        </p>
    @endforeach
</div>
@endsection