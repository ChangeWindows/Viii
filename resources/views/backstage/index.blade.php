@extends('layouts.backstage')

@section('jumbotron')
<h1>Hello {{ Auth::user()->name }}</h1>
@endsection

@section('toolbar')
@endsection

@section('content')
<div class="col">
    <h2>Backstage</h2>
</div>
@endsection