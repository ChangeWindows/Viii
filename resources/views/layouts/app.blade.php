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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome-core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome-light.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome-brands.css') }}" rel="stylesheet">
</head>
<body class="light">
    <div class="container-fluid">
        <div class="row cw-row">
            <div class="col-sm-3 col-md-2 cw-sidebar" id="navbar">
                <div class="contrast-40">
                    <div class="noise">
                        <div class="flexing">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img class="img-logo" alt="ChangeWindows logo" src="{{ asset('img/logo/logo-light.png') }}"></a>
                            </div>
                            <div class="list-group">
                                <a href="{{ route('home') }}" class="list-group-item {{ Request::is('/') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-home"></i> <span class="title">Timeline</span></a>
                                <a href="{{ route('milestones') }}" class="list-group-item {{ Request::is('milestones*') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-map-signs"></i> <span class="title">Milestones</span></a>
                                <a href="{{ route('rings') }}" class="list-group-item {{ Request::is('rings*') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-bullseye"></i> <span class="title">Rings</span></a>
                                <a href="{{ route('year') }}" class="list-group-item {{ Request::is('year*') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-calendar-alt"></i> <span class="title">Year in review</span></a>
                                <a href="http://medium.com/changewindows" class="list-group-item list-group-item-action"><i class="fab fa-fw fa-medium"></i> <span class="title">Stories</span></a>
                                <a href="http://twitter.com/changewindows" class="list-group-item list-group-item-action"><i class="fab fa-fw fa-twitter"></i> <span class="title">Twitter</span></a>
                            </div>
                            <div class="list-group-gap"></div>
                            <div class="list-group">
                                @auth
                                    <a href="{{ route('manageHome') }}" class="list-group-item list-group-item-action"><i class="fal fa-fw fa-tachometer-alt"></i> <span class="title">Backstage</span></a>
                                    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fal fa-fw fa-sign-out"></i> <span class="title">Sign out</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="list-group-item {{ Request::is('login') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-sign-in"></i> <span class="title">Sign in</span></a>
                                    <a href="{{ route('register') }}" class="list-group-item {{ Request::is('register') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-user-plus"></i> <span class="title">Register</span></a>
                                @endauth
                                <a href="{{ route('about') }}" class="list-group-item {{ Request::is('about') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-info-circle"></i> <span class="title">About</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col cw-content">
                <div class="flexing">
                    <div class="row row-jumbotron contrast-40">
                        <div class="col noise">
                            <div class="jumbotron">
                                @yield( 'jumbotron' )
                                <div class="toolbar">
                                    @yield( 'toolbar' )
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-main contrast-95">
                        <div class="col noise">
                            <div class="content container-fluid">
                                <div class="row">
                                    @yield( 'content' )
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-height contrast-40">
                        <div class="col noise">
                            <div class="height-25"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield( 'modals' )
        <script src="{{ asset('js/app.js') }}"></script>
    </div>
</body>
</html>
