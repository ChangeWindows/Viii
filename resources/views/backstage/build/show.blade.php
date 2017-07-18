@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        {{ $build->id }}
        <a class="btn btn-primary pull-right" href="{{ route('editBuild', ['build' => $build->id]) }}"><i class="fa fa-fw fa-pencil"></i> Edit</a>
        <a class="btn btn-success pull-right" href="{{ route('createDelta', ['build' => $build->id]) }}"><i class="fa fa-fw fa-plus"></i> New delta</a>
    </h1>
</div>
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $flights as $flight )
            @if ( $flight->deltas->getString( 'delta' ) != $current_delta )
                <div class="col-xl-12">
                    <h2>{{ $flight->deltas->getString( 'delta' ) }}</h2>
                </div>
            @endif
            @if ( $flight->canPromote() )
                @php    
                    $main_col = 8;
                @endphp
            @else
                @php    
                    $main_col = 10;
                @endphp
            @endif
            @php    
                $current_delta = $flight->deltas->getString( 'delta' );
            @endphp
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="row list-bar">
                    <a class="col-{{ $main_col }} list-bar-item list-bar-default list-bar-indicate list-bar-{{ $flight->deltas->getPlatformName( 'class' ) }}" href="{{ route('editDelta', ['id' => $flight->id]) }}">{{ $flight->getRingName( 'short' ) }}</a>
                    @if ( $main_col == 8 )
                        <a class="col-2 list-bar-item list-bar-success text-center" href="{{ route('promoteDelta', ['id' => $flight->id]) }}"><i class="fa fa-fw fa-angle-double-up"></i></a>
                    @endif
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{ route('deleteDelta', ['id' => $flight->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $flights->links() }}
</div>
@endsection