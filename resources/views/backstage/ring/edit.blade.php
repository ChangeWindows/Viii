@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('patchRing') }}" class="row">
        <div class="col-12">
            <h1>
                Edit {{ $ring->name }}
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-check"></i> Save</button>
            </h1>
        </div>
        {!! method_field('patch') !!}
        {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" aria-describedby="id" value="{{ $ring->id }}">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Name" value="{{ $ring->name }}">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="short">Short</label>
                <input type="text" class="form-control" id="short" name="short" aria-describedby="short" placeholder="Short" value="{{ $ring->short }}">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="acronym">Acronym</label>
                <input type="text" class="form-control" id="acronym" name="acronym" aria-describedby="acronym" placeholder="Acronym" value="{{ $ring->acronym }}">
            </div>
        </div>
    </form>
</div>
@endsection