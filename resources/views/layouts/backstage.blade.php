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
                <a class="navbar-brand" href="{{ route('home') }}"><span class="brand">Change<span class="bold">Windows</span></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggle" aria-controls="navbar-toggle" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar-toggle">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item {{ Request::is('backstage') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('manageHome') }}">Backstage</a>
                        </li>
                        <li class="nav-item {{ Request::is('backstage/builds*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('manageBuild') }}">Builds</a>
                        </li>
                        <li class="nav-item {{ Request::is('backstage/milestones*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('manageMilestone') }}">Milestones</a>
                        </li>
                        <li class="nav-item {{ Request::is('backstage/settings') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('manageSettings') }}">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Mainstage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
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