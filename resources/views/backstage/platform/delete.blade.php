@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>Delete {{ $platform->name }}</h1>
    <form method="POST" action="{{ route('destroyPlatform') }}">
        {!! method_field('delete') !!}
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="{{ $platform->id }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i> Delete platform</button>
    </form>
</div>
@endsection