<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-toggleable-xl navbar-light bg-faded" id="navbar">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#cwnav" aria-controls="cwnav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand active" href="backstage">
                <img alt="ChangeWindows logo" src="assets/logo/logo-light.png">
                <span class="hidden-sm-down"><span class="brand">Change<span class="bold">Windows</span></span>
            </a>

            <div class="collapse navbar-collapse" id="cwnav">
                <div class="navbar-nav mr-auto mt-lg-0">
                    {{--
                    <a class="nav-item nav-link" href="{{ route('milestones') }}">Milestones</a>
                    <a class="nav-item nav-link" href="{{ route('rings') }}">Rings</a>
                    <a class="nav-item nav-link" href="{{ route('year') }}">Year</a>
                    --}}
                    <a class="nav-item nav-link" href="https://medium.com/changewindows">Blog</a>
                </div>
                <div class="navbar-nav my-lg-0">
                    <li class="nav-item dropdown ellipse">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="ellipses">...</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{--
                            <a class="dropdown-item" href="{{ route('settings') }}"><i class="fa fa-fw fa-cog"></i> Settings</a>
                            --}}
                            <a class="dropdown-item" href="{{ route('about') }}"><i class="fa fa-fw fa-cog"></i> About</a>
                            <a class="dropdown-item" href="{{ route('privacy') }}"><i class="fa fa-fw fa-cog"></i> Privacy</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://twitter.com/changewindows"><i class="fa fa-fw fa-cog"></i> Twitter</a>
                            @if (Route::has('login'))
                                <div class="dropdown-divider"></div>
                                    @if (Auth::check())
                                        <a class="dropdown-item" href="{{ route('backstage') }}"><i class="fa fa-fw fa-cog"></i> Backstage</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-cog"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @else
                                        <a class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-fw fa-cog"></i> Login</a>
                                        <a class="dropdown-item" href="{{ route('register') }}"><i class="fa fa-fw fa-cog"></i> Register</a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container content">
        <div class="row">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
