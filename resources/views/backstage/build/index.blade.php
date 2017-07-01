@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        Builds
        <a href="{{ route('createBuild') }}" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> New build</a>
    </h1>
</div>
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $builds as $build )
            <div class="col-md-3">
                <div class="row list-bar">
                    <a class="col-10 list-bar-item list-bar-default" href="{{ route('editBuild', ['id' => $build->id]) }}">{{ $build->id }}</a>
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{ route('deleteBuild', ['id' => $build->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $builds->links() }}
</div>
@endsection