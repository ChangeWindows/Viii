@extends('layouts.app')

@section('content')
<div class="col-md-8 list-bar-group">
    <div class="row">
        @foreach ( $flights as $flight )
            <div class="col-md-12">
                {{ $flight->release->diffForHumans() }}
            </div>
            <div class="col-md-12">
                <div class="row list-bar">
                    <div class="col-1 list-bar-item list-bar-platform list-bar-{{ $flight->deltas->getPlatformName( 'class' ) }}">
                        <img class="img-responsive img-platform" alt="{{ $flight->deltas->getPlatformName() }}" src="{{ asset('img/platform/'.$flight->deltas->getPlatformName( 'class' ).'.png') }}">
                    </div>
                    <a class="col-11 list-bar-item list-bar-grey" href="{{ route('showBuild', ['id' => $flight->build_id]) }}">
                        <div class="row list-bar-item-row">
                            <div class="col-4">{{ $flight->deltas->getString() }}</div>
                            <div class="col-8"><span class="label {{ $flight->getRingName( 'class' ) }}">{{ $flight->getRingName( 'short' ) }}</span></div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $flights->links() }}
</div>
@endsection