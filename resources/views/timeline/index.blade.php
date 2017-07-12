@extends('layouts.app')

@section('content')
<div class="col-md-8 list-bar-group">
    <div class="row">
        @foreach ( $deltas as $delta )
            <div class="col-md-12">
                {{ $delta->release->diffForHumans() }}
            </div>
            <div class="col-md-12">
                <div class="row list-bar">
                    <div class="col-1 list-bar-item list-bar-platform list-bar-{{ $delta->getPlatformName( 'class' ) }}">
                        <img class="img-responsive img-platform" alt="{{ $delta->getPlatformName() }}" src="{{ asset('img/platform/'.$delta->getPlatformName( 'class' ).'.png') }}">
                    </div>
                    <a class="col-11 list-bar-item list-bar-grey" href="{{ route('showBuild', ['id' => $delta->build]) }}">
                        <div class="row list-bar-item-row">
                            <div class="col-4">{{ $delta->getString() }}</div>
                            <div class="col-8"><span class="label {{ $delta->getRingName( 'class' ) }}">{{ $delta->getRingName( 'short' ) }}</span></div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $deltas->links() }}
</div>
@endsection