@extends('layouts.backstage')

@section('jumbotron')
<h1>Hello {{ Auth::user()->name }}</h1>
@endsection

@section('toolbar')
<a class="btn btn-default" href="http://medium.com/changewindows"><i class="fab fa-fw fa-medium"></i> Stories</a>
<a class="btn btn-default" href="http://twitter.com/changewindows"><i class="fab fa-fw fa-twitter"></i> Twitter</a>
<a class="btn btn-default" href="http://changewindows.org/stats/index.php"><i class="fal fa-fw fa-chart-pie"></i> Piwik</a>
@endsection

@section('content')
<div class="col">
    <h2>Backstage</h2>
</div>
@endsection