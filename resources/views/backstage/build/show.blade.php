@extends('layouts.backstage')

@section('jumbotron')
<h1>{{ $build->getString( 'full' ) }} for {{ $build->getPlatformName() }}</h1>
@endsection

@section('toolbar')
<a class="btn btn-default" href="#editBuildModal" data-toggle="modal" data-target="#editBuildModal"><i class="fal fa-fw fa-pencil"></i> Edit</a>
<a class="btn btn-default" href="{{ route('promoteBuildNow', ['build' => $build->id]) }}"><i class="fal fa-fw fa-angle-double-up"></i> Promote now</a>
<a class="btn btn-default" href="#removeBuildModal" data-toggle="modal" data-target="#removeBuildModal"><i class="fal fa-fw fa-trash-alt"></i> Delete</a>
@endsection

@section('content')
<div class="col">
    <h2>Platform</h2>
    <p>{{ $build->getPlatformName() }}</p>
    @if ( $build->hasRing( 'skip' ) )
        <p><span class="label skip">Fast Ring Skip Ahead</span> {{ $build->skip }}</p>
    @endif
    @if ( $build->hasRing( 'fast' ) )
        <p><span class="label fast">Fast Ring Active</span> {{ $build->fast }}</p>
    @endif
    @if ( $build->hasRing( 'slow' ) )
        <p><span class="label slow">Slow Ring</span> {{ $build->slow }}</p>
    @endif
    @if ( $build->hasRing( 'preview' ) )
        <p><span class="label preview">Release Preview Ring</span> {{ $build->preview }}</p>
    @endif
    @if ( $build->hasRing( 'release' ) )
        <p><span class="label release">Release Ring</span> {{ $build->release }}</p>
    @endif
    @if ( $build->hasRing( 'targeted' ) )
        <p><span class="label targeted">Semi-Annual Channel Targeted</span> {{ $build->targeted }}</p>
    @endif
    @if ( $build->hasRing( 'broad' ) )
        <p><span class="label broad">Semi-Annual Channel Broad</span> {{ $build->broad }}</p>
    @endif
    @if ( $build->hasRing( 'lts' ) )
        <p><span class="label lts">Long-Term Servicing Channel</span> {{ $build->lts }}</p>
    @endif
</div>
@endsection

@section('modals')
<div class="modal fade" id="editBuildModal" tabindex="-1" role="dialog" aria-labelledby="editBuildModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $build->getString() }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-fw fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('patchBuild') }}" class="row row-p-10">
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
<div class="modal fade modal-danger" id="removeBuildModal" tabindex="-1" role="dialog" aria-labelledby="removeBuildModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete {{ $build->getString() }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-fw fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Are you certain you want to delete this build?</h3>
                <a class="btn btn-danger btn-block" href="{{ route('deleteBuild', ['id' => $build->id]) }}"><i class="fal fa-fw fa-trash-alt"></i> Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection