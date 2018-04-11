@extends('layouts.backstage')

@section('jumbotron')
<h1>Edit {{ $build->build }} for {{ $build->getPlatformName() }}</h1>
@endsection

@section('toolbar')
@endsection

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('storeBuild') }}" class="row row-p-10">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" id="build_id" name="build_id" aria-describedby="build_id" value="{{ $build->id }}">
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="build_string">String</label>
                <input type="text" class="form-control" id="build_string" name="build_string" aria-describedby="build_string" placeholder="Build string" value="{{ $build->getString( 'full' ) }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="keaj">Leak</label>
                <input type="date" class="form-control" id="keaj" name="keaj" aria-describedby="keaj" placeholder="Date" value="{{ $build->leak }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="s,jl">Fast Ring Skip Ahead</label>
                <input type="date" class="form-control" id="s,jl" name="s,jl" aria-describedby="s,jl" placeholder="Date" value="{{ $build->skip }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="fast">Fast Ring Active</label>
                <input type="date" class="form-control" id="fast" name="fast" aria-describedby="fast" placeholder="Date" value="{{ $build->fast }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="slow">Slow Ring</label>
                <input type="date" class="form-control" id="slow" name="slow" aria-describedby="slow" placeholder="Date" value="{{ $build->slow }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="preview">Release Preview Ring</label>
                <input type="date" class="form-control" id="preview" name="preview" aria-describedby="preview" placeholder="Date" value="{{ $build->preview }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="release">Release Ring</label>
                <input type="date" class="form-control" id="release" name="release" aria-describedby="release" placeholder="Date" value="{{ $build->release }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="pilot">Semi-Annual Channel Targeted</label>
                <input type="date" class="form-control" id="pilot" name="pilot" aria-describedby="pilot" placeholder="Date" value="{{ $build->pilot }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="broad">Semi-Annual Channel Broad</label>
                <input type="date" class="form-control" id="broad" name="broad" aria-describedby="broad" placeholder="Date" value="{{ $build->broad }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="lts">Long-Term Servicing Channel</label>
                <input type="date" class="form-control" id="lts" name="lts" aria-describedby="lts" placeholder="Date" value="{{ $build->ltsc }}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="changelog">Changelog</label>
                <textarea class="form-control" id="changelog" name="changelog" aria-describedby="changelog" placeholder="Changelog"></textarea>
            </div>
        </div>
    </form>
</div>
@endsection

@section('modals')
@endsection