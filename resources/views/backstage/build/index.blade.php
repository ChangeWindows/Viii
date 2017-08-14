@extends('layouts.backstage')

@section('jumbotron')
<h1>Builds</h1>
<!--<h1>Hello {{ Auth::user()->name }}</h1>-->
@endsection

@section('toolbar')
<a href="{{ route('createBuild') }}" class="btn btn-default"><i class="fal fa-fw fa-plus"></i> New build</a>
@endsection

@section('content')
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $builds as $build )
            @if ( $build->milestone_id != $current_milestone )
                <div class="col-xl-12">
                    <h2>{{ \App\Milestone::find( $build->milestone_id )->name }}</h2>
                </div>
                @php
                    $current_milestone = $build->milestone_id
                @endphp
            @endif
            <div class="col-md-3">
                <div class="row list-bar">
                    <a class="col-8 list-bar-item list-bar-default" href="{{ route('showBuild', ['id' => $build->id]) }}">{{ $build->id }}</a>
                    <a class="col-2 list-bar-item list-bar-success text-center" href="{{ route('createDelta', ['build' => $build->id]) }}"><i class="fal fa-fw fa-plus"></i></a>
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{ route('deleteBuild', ['id' => $build->id]) }}"><i class="fal fa-fw fa-trash-alt"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $builds->links() }}
</div>
@endsection