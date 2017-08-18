@extends('layouts.backstage')

@section('jumbotron')
<h1>Edit {{ $flight->getRingName() }} for {{ $flight->delta_id }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('patchDelta') }}" class="row row-p-10">
        {!! method_field('patch') !!}
        {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" aria-describedby="id" value="{{ $flight->id }}">
        <input type="hidden" class="form-control" id="delta_id" name="delta_id" aria-describedby="delta_id" value="{{ $flight->delta_id }}">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="release">Release</label>
                <input type="date" class="form-control" id="release" name="release" aria-describedby="release" placeholder="Date" value="{{ $flight->release->toDateString() }}">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="ring">Ring</label>
                <input type="number" class="form-control" id="platform" name="ring" aria-describedby="ring" placeholder="Ring" value="{{ $flight->ring_id }}">
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary"><i class="fal fa-fw fa-check"></i> Save</button>
        </div>
    </form>
</div>
@endsection