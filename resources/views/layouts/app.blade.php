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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fa-light.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fa-brands.min.css') }}" rel="stylesheet">
    </head>
    <body class="light wip">
        <!--
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
                        </li>
                    </div>
                </div>
            </div>
        </nav>
        -->
        @yield( 'jumbotron' )
        @yield( 'content' )
        @yield( 'modals' )
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>