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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome-pro-core.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome-pro-light.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome-pro-brands.css') }}" rel="stylesheet">
    </head>
    <body class="light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbar">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#cwnav" aria-controls="cwnav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand active" href="backstage">
                    <span class="hidden-sm-down"><span class="brand">Change<span class="bold">Windows</span></span>
                </a>

                <div class="collapse navbar-collapse" id="cwnav">
                    <div class="navbar-nav mr-auto mt-lg-0">
                        <a class="nav-item nav-link" href="{{ route('milestones') }}">Milestones</a>
                        <a class="nav-item nav-link" href="{{ route('rings') }}">Rings</a>
                        <a class="nav-item nav-link" href="{{ route('year') }}">Year</a>
                        <a class="nav-item nav-link" href="https://medium.com/changewindows">Blog</a>
                    </div>
                    <div class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @auth
                                    {{ Auth::user()->name }}
                                @endauth
                                @guest
                                    More
                                @endauth
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('about') }}"><i class="fal fa-fw fa-cog"></i> About</a>
                                <a class="dropdown-item" href="{{ route('privacy') }}"><i class="fal fa-fw fa-cog"></i> Privacy</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="https://twitter.com/changewindows"><i class="fal fa-fw fa-cog"></i> Twitter</a>
                                <div class="dropdown-divider"></div>
                                    @auth
                                        <a class="dropdown-item" href="{{ route('manageBuild') }}"><i class="fal fa-fw fa-cog"></i> Backstage</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><i class="fal fa-fw fa-cog"></i>
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @endauth
                                    @guest
                                        <a class="dropdown-item" href="{{ route('login') }}"><i class="fal fa-fw fa-cog"></i> Login</a>
                                        <a class="dropdown-item" href="{{ route('register') }}"><i class="fal fa-fw fa-cog"></i> Register</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container">
                @yield( 'jumbotron' )
                <div class="toolbar">
                    @yield( 'toolbar' )
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @yield( 'content' )
            </div>
        </div>
        @yield( 'modals' )
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>