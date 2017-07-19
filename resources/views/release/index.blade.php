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
            <div class="col-xl-12">
                <h2>{{ $flight->deltas->getString( 'full' ) }}</h2>
                @if ( $flight->deltas->getString( 'delta' ) != $current_delta )
                    <a href="{{ route('editDelta', ['id' => $flight->id]) }}">{{ $flight->getRingName( 'short' ).': '.$flight->release }}</a>
                @endif
                @php    
                    $current_delta = $flight->deltas->getString( 'delta' );
                @endphp
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $flights->links() }}
</div>
@endsection