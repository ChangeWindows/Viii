@extends('layouts.app')

@section('content')
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $releases as $release )
            <div class="col-md-12">
                <div class="row list-bar">
                    <a class="col-12 list-bar-item list-bar-default" href="{{ route('editRelease', ['id' => $release->id]) }}">{{ $release->getPlatformName().' '.$release->getString().' '.$release->getRingName() }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $releases->links() }}
</div>
@endsection