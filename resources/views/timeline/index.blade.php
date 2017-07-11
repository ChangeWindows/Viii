@extends('layouts.app')

@section('content')
<div class="col-md-8 list-bar-group">
    <div class="row">
        @foreach ( $releases as $release )
            <div class="col-md-12">
                <div class="row list-bar">
                    <div class="col-1 list-bar-item list-bar-platform list-bar-{{ $release->getPlatformName( 'class' ) }}">
                        <img class="img-responsive img-platform" alt="{{ $release->getPlatformName() }}" src="{{ asset('img/platform/'.$release->getPlatformName( 'class' ).'.png') }}">
                    </div>
                    <a class="col-11 list-bar-item list-bar-default" href="{{ route('showBuild', ['id' => $release->build]) }}">
                        <div class="row list-bar-item-row">
                            <div class="col-4">{{ $release->getString() }}</div>
                            <div class="col-8"><span class="label {{ $release->getRingName( 'class' ) }}">{{ $release->getRingName( 'short' ) }}</span></div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $releases->links() }}
</div>
@endsection