@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>Releases <a href="{{ route('createRelease') }}" class="btn btn-primary pull-right"><i class="fa fa-fw fa-cog"></i> New release</a></h1>
</div>
@foreach ( $releases as $release )
    <div class="col-md-3">
        <a href="{{ route('editRelease', ['id' => $release->id]) }}">{{ $release->getString().' ('.$release->getPlatformName().')' }}</a>
        <a class="pull-right" href="{{ route('deleteRelease', ['id' => $release->id]) }}"><i class="fa fa-fw fa-trash"></i></a>
    </div>
@endforeach
<div class="col-md-12">
    {{ $releases->links() }}
</div>
@endsection