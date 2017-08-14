@extends('layouts.backstage')

@section('content')
<div class="col-md-12">
    <h1>Delete {{ $delta->getString() }}</h1>
    <form method="POST" action="{{ route('destroyDelta') }}">
        {!! method_field('delete') !!}
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="{{ $delta->id }}">
        <button type="submit" class="btn btn-primary"><i class="fal fa-fw fa-trash-alt"></i> Delete delta</button>
    </form>
</div>
@endsection