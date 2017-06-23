@extends('layouts.backstage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Welcome back, {{ Auth::user()->name }}</h1>
        </div>
    </div>
</div>
@endsection