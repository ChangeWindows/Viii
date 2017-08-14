@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('storeMilestone') }}" class="row row-p-10">
        <div class="col-12">
            <h1>
                New milestone
                <button type="submit" class="btn btn-primary pull-right"><i class="fal fa-fw fa-check"></i> Save</button>
            </h1>
        </div>
        {{ csrf_field() }}
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="id">Id</label>
                <input type="text" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Id">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="os">OS name</label>
                <input type="text" class="form-control" id="os" name="os" aria-describedby="os" placeholder="OS name">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Name">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="codename">Codename</label>
                <input type="text" class="form-control" id="codename" name="codename" aria-describedby="codename" placeholder="Codename">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="version">Version</label>
                <input type="number" class="form-control" id="version" name="version" aria-describedby="version" placeholder="Version">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
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
        </div>
    </form>
</div>
@endsection