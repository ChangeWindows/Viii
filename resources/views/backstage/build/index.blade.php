@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        Builds
        <a href="{{ route('createBuild') }}" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> New build</a>
    </h1>
</div>
@foreach ( $builds as $build )
    <div class="col-md-3">
        <a href="{{ route('editBuild', ['id' => $build->id]) }}">{{ $build->id }}</a>
        <a class="pull-right" href="{{ route('deleteBuild', ['id' => $build->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
    </div>
@endforeach
<div class="col-md-12">
    {{ $builds->links() }}
</div>
@endsection