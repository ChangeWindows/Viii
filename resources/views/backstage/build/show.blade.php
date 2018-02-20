@extends('layouts.backstage')

@section('jumbotron')
<h1>{{ $build->getString( 'full' ) }} for {{ $build->getPlatformName() }}</h1>
@endsection

@section('toolbar')
<a class="btn btn-default" href="#editBuildModal" data-toggle="modal" data-target="#editBuildModal"><i class="fal fa-fw fa-pencil"></i> Edit</a>
<a class="btn btn-default" href="#removeBuildModal" data-toggle="modal" data-target="#removeBuildModal"><i class="fal fa-fw fa-trash-alt"></i> Delete</a>
@endsection

@section('content')
<div class="col">
    <h2>Platform</h2>
    <p>{{ $build->getPlatformName() }}</p>
</div>
@endsection

@section('modals')
<div class="modal fade" id="editBuildModal" tabindex="-1" role="dialog" aria-labelledby="editBuildModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $build->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-fw fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                    {!! method_field('patch') !!}
                    {{ csrf_field() }}
                    <div class="col-12">
                        <div class="form-group">
                            <label for="string">Build</label>
                            <input type="text" class="form-control" id="string" name="string" aria-describedby="string" placeholder="Build" value="{{ $build->getString( 'full' ) }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="milestone">Milestone</label>
                            <input type="text" class="form-control" id="milestone" name="milestone_id" aria-describedby="milestone" placeholder="Milestone" value="{{ $build->milestone_id }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fal fa-fw fa-check"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection