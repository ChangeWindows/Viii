@extends('layouts.backstage')

@section('jumbotron')
<h1>Milestones</h1>
@endsection

@section('toolbar')
<a class="btn btn-default" href="#newMilestoneModal" data-toggle="modal" data-target="#newMilestoneModal"><i class="fal fa-fw fa-plus"></i> New milestone</a>
@endsection

@section('content')
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $milestones as $milestone )
            <style>
                .{{ $milestone->id }}:hover {
                    color: #fff;
                    background-color: {{ $milestone->color }} !important;
                }
            </style>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="row list-bar list-bar-border">
                    <a class="col-10 list-bar-item list-bar-default {{ $milestone->id }}" href="{{ route('editMilestone', ['id' => $milestone->id]) }}">{{ $milestone->version.' &middot; '.$milestone->name }}</a>
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{ route('deleteMilestone', ['id' => $milestone->id]) }}"><i class="fal fa-fw fa-trash-alt"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $milestones->links() }}
</div>
@endsection

@section('modals')
<div class="modal fade" id="newMilestoneModal" tabindex="-1" role="dialog" aria-labelledby="newMilestoneModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New milestone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-fw fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('storeMilestone') }}" class="row row-p-10">
                    {{ csrf_field() }}
                    <div class="col-12">
                        <div class="form-group">
                            <label for="id">Id</label>
                            <input type="text" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Id">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="os">OS name</label>
                            <input type="text" class="form-control" id="os" name="os" aria-describedby="os" placeholder="OS name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="codename">Codename</label>
                            <input type="text" class="form-control" id="codename" name="codename" aria-describedby="codename" placeholder="Codename">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="short">Short codename</label>
                            <input type="text" class="form-control" id="short" name="short" aria-describedby="short" placeholder="Short codename">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="version">Version</label>
                            <input type="number" class="form-control" id="version" name="version" aria-describedby="version" placeholder="Version">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" id="color" name="color" aria-describedby="color" placeholder="Color">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Description"></textarea>
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