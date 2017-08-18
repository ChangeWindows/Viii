@extends('layouts.backstage')

@section('jumbotron')
<h1>Builds</h1>
@endsection

@section('toolbar')
<a class="btn btn-default" href="#newBuildModal" data-toggle="modal" data-target="#newBuildModal"><i class="fal fa-fw fa-plus"></i> New build</a>
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

@section('modals')
<div class="modal fade" id="newBuildModal" tabindex="-1" role="dialog" aria-labelledby="newBuildModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New build</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-fw fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('storeBuild') }}" class="row row-p-10">
                    {{ csrf_field() }}
                    <div class="col-12">
                        <div class="form-group">
                            <label for="id">Build</label>
                            <input type="number" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Build">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="milestone_id">Milestone</label>
                            <input type="text" class="form-control" id="milestone_id" name="milestone_id" aria-describedby="milestone_id" placeholder="Milestone">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fal fa-fw fa-plus"></i> Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection