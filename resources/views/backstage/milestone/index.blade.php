@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        Milestones
        <a href="{{ route('createMilestone') }}" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> New milestone</a>
    </h1>
</div>
@foreach ( $milestones as $milestone )
    <div class="col-md-3">
        <a href="{{ route('editMilestone', ['id' => $milestone->id]) }}">{{ $milestone->version.' &middot; '.$milestone->name }}</a>
        <a class="pull-right" href="{{ route('deleteMilestone', ['id' => $milestone->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
    </div>
@endforeach
<div class="col-md-12">
    {{ $milestones->links() }}
</div>
@endsection