@extends('layouts.backstage')

@section('jumbotron')
<h1>Edit {{ $milestone->name }} version {{ $milestone->version }}</h1>
@endsection

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('patchMilestone') }}" class="row row-p-10">
        {!! method_field('patch') !!}
        {{ csrf_field() }}
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="id">Id</label>
                <input type="text" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Id" value="{{ $milestone->id }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="os">OS name</label>
                <input type="text" class="form-control" id="os" name="os" aria-describedby="os" placeholder="OS name" value="{{ $milestone->os }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Name" value="{{ $milestone->name }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="codename">Codename</label>
                <input type="text" class="form-control" id="codename" name="codename" aria-describedby="codename" placeholder="Codename" value="{{ $milestone->codename }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="version">Version</label>
                <input type="number" class="form-control" id="version" name="version" aria-describedby="version" placeholder="Version" value="{{ $milestone->version }}">
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" class="form-control" id="color" name="color" aria-describedby="color" placeholder="Color" value="{{ $milestone->color }}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Description">{{ $milestone->description }}</textarea>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary"><i class="fal fa-fw fa-check"></i> Save</button>
        </div>
    </form>
</div>
@endsection