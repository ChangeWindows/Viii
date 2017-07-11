@extends('layouts.app')

@section('content')
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $releases as $release )
            <div class="col-md-12">
                <div class="row list-bar">
                    <a class="col-12 list-bar-item list-bar-default" href="{{ route('showBuild', ['id' => $release->build]) }}">
                        <div class="row list-bar-item-row">
                            <div class="col-1">{{ $release->getPlatformName() }}</div>
                            <div class="col-5">{{ $release->getString() }}</div>
                            <div class="col-6"><span class="label {{ $release->getRingName( 'class' ) }}">{{ $release->getRingName( 'short' ) }}</span></div>
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