@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        Milestones
        <a href="{{ route('createMilestone') }}" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> New milestone</a>
    </h1>
</div>
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $milestones as $milestone )
            <style>
                .{{ $milestone->id }}:hover {
                    color: #fff;
                    background-color: {{ $milestone->color }} !important;
                }
            </style>
            <div class="col-md-3">
                <div class="row list-bar list-bar-border">
                    <a class="col-10 list-bar-item list-bar-default {{ $milestone->id }}" href="{{ route('editMilestone', ['id' => $milestone->id]) }}">{{ $milestone->version.' &middot; '.$milestone->name }}</a>
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{ route('deleteMilestone', ['id' => $milestone->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $milestones->links() }}
</div>
@endsection