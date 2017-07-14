@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <h1>
        Windows 10 build 10.0.{{ $build->id }}
    </h1>
</div>
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $flights as $flight )
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="row list-bar">
                    <a class="col-12 list-bar-item list-bar-default" href="{{ route('editDelta', ['id' => $flight->id]) }}">{{ $flight->getString( 'delta' ).'  '.$flight->getRingName( 'short' ) }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $flights->links() }}
</div>
@endsection