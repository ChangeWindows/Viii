@extends('layouts.login')

@section('content')
<h2>Reset password</h2>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fal fa-fw fa-paper-plane"></i> Send reset link
            </button>
        </div>
    </div>
</form>
@endsection
