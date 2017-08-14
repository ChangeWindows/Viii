@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>
        Deltas
    </h1>
</div>
<div class="col-md-12 list-bar-group">
    <div class="row">
        @foreach ( $deltas as $delta )
            <div class="col-md-3">
                <div class="row list-bar">
                    <a class="col-10 list-bar-item list-bar-default" href="{{ route('editDelta', ['id' => $delta->id]) }}">{{ $delta->getString().' ('.$delta->getPlatformName().')' }}</a>
                    <a class="col-2 list-bar-item list-bar-danger text-center" href="{{ route('deleteDelta', ['id' => $delta->id]) }}"><i class="fal fa-fw fa-trash-alt"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    {{ $deltas->links() }}
</div>
@endsection