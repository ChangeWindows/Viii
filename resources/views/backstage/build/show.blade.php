@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        {{ $build->id }}
        <a class="btn btn-primary pull-right" href="{{ route('editBuild', ['build' => $build->id]) }}"><i class="fa fa-fw fa-pencil"></i> Edit</a>
        <a class="btn btn-success pull-right" href="{{ route('createDelta', ['build' => $build->id]) }}"><i class="fa fa-fw fa-plus"></i> New delta</a>
    </h1>
</div>
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $flights as $flight )
            @if ( $flight->platform != $current_platform )
                <div class="col-xl-12">
                    <h2>{{ \App\Platform::find( $flight->platform )->name }}</h2>
                </div>
                @php
                    $current_platform = $flight->platform
                @endphp
            @endif
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="row list-bar">
                    <a class="col-8 list-bar-item list-bar-default" href="{{ route('editDelta', ['id' => $flight->id]) }}">{{ $flight->getString( 'delta' ).'  '.$flight->getRingName( 'short' ) }}</a>
                    <a class="col-2 list-bar-item list-bar-success text-center" href="{{ route('promoteDelta', ['id' => $flight->id]) }}"><i class="fa fa-fw fa-angle-double-up"></i></a>
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{ route('deleteDelta', ['id' => $flight->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $flights->links() }}
</div>
@endsection