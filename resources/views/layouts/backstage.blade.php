<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Backstage</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fa-light.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fa-brands.min.css') }}" rel="stylesheet">
    </head>
    <body class="light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand {{ Request::is('backstage') ? 'active' : '' }}" href="{{ route('manageHome') }}"><span class="brand">Change<span class="bold">Windows</span></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggle" aria-controls="navbar-toggle" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar-toggle">
                    <div class="navbar-nav mr-auto mt-lg-0">
                        <a class="nav-item nav-link {{ Request::is('backstage/builds*') ? 'active' : '' }}" href="{{ route('manageBuild') }}">Builds</a>
                        <a class="nav-item nav-link {{ Request::is('backstage/milestones*') ? 'active' : '' }}" href="{{ route('manageMilestone') }}">Milestones</a>
                        <a class="nav-item nav-link {{ Request::is('backstage/changelogs*') ? 'active' : '' }}" href="{{ route('manageChangelog') }}">Changelogs</a>
                        <a class="nav-item nav-link {{ Request::is('backstage/settings') ? 'active' : '' }}" href="{{ route('manageSettings') }}">Settings</a>
                    </div>
                    <div class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('home') }}"><i class="fal fa-fw fa-home"></i> Mainstage</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('about') }}"><i class="fal fa-fw fa-info"></i> About</a>
                                <a class="dropdown-item" href="{{ route('privacy') }}"><i class="fal fa-fw fa-eye"></i> Privacy</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><i class="fal fa-fw fa-sign-out"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </li>
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