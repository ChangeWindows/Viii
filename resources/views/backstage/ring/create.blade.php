@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('storeRing') }}" class="row">
        <div class="col-12">
            <h1>
                New ring
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-check"></i> Save</button>
            </h1>
        </div>
        {{ csrf_field() }}
        <div class="col-12">
            <h3>
                Default
            </h3>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="default_name">Name</label>
                <input type="text" class="form-control" id="default_name" name="default_name" aria-describedby="default_name" placeholder="Name">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="default_short">Short</label>
                <input type="text" class="form-control" id="default_short" name="default_short" aria-describedby="default_short" placeholder="Short">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="default_acronym">Acronym</label>
                <input type="text" class="form-control" id="default_acronym" name="default_acronym" aria-describedby="default_acronym" placeholder="Acronym">
            </div>
        </div>
        <div class="col-12">
            <h3>
                Xbox
            </h3>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="xbox_name">Name</label>
                <input type="text" class="form-control" id="xbox_name" name="xbox_name" aria-describedby="xbox_name" placeholder="Name">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="xbox_short">Short</label>
                <input type="text" class="form-control" id="xbox_short" name="xbox_short" aria-describedby="xbox_short" placeholder="Short">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="xbox_acronym">Acronym</label>
                <input type="text" class="form-control" id="xbox_acronym" name="xbox_acronym" aria-describedby="xbox_acronym" placeholder="Acronym">
            </div>
        </div>
        <div class="col-12">
            <h3>
                Other
            </h3>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="other_name">Name</label>
                <input type="text" class="form-control" id="other_name" name="other_name" aria-describedby="other_name" placeholder="Name">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="xbox_short">Short</label>
                <input type="text" class="form-control" id="other_short" name="other_short" aria-describedby="other_short" placeholder="Short">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="other_acronym">Acronym</label>
                <input type="text" class="form-control" id="other_acronym" name="other_acronym" aria-describedby="other_acronym" placeholder="Acronym">
            </div>
        </div>
    </form>
</div>
@endsection