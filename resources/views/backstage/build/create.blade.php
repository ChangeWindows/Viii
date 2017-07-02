@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('storeBuild') }}" class="row row-p-10">
        <div class="col-12">
            <h1>
                New build
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-check"></i> Save</button>
            </h1>
        </div>
        {!! method_field('patch') !!}
        {{ csrf_field() }}
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="id">Build</label>
                <input type="number" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Build">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="milestone">Milestone</label>
                <input type="text" class="form-control" id="milestone" name="milestone_id" aria-describedby="milestone" placeholder="Milestone">
            </div>
        </div>
    </form>
</div>
@endsection