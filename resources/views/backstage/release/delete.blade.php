@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>Delete {{ $release->getString() }}</h1>
    <form method="POST" action="{{ route('destroyRelease') }}">
        {!! method_field('delete') !!}
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="{{ $release->id }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i> Delete release</button>
    </form>
</div>
@endsection