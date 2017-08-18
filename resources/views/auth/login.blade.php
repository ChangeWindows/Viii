@extends('layouts.login')

@section('content')
<h2 class="brand">Change<span class="bold">Windows</span></h2>
<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="col">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fal fa-fw fa-sign-in"></i> Sign in
            </button>
        </div>
    </div>
    <div class="form-group">
        <div class="col text-center">
            <hr />

            <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot your password?
            </a>
        </div>
    </div>
</form>
@endsection
