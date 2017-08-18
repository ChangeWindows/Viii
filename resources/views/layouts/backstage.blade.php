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
                        <div class="logo">
                            <a href="{{ route('home') }}"><img class="img-logo" alt="ChangeWindows logo" src="{{ asset('img/logo/logo-light.png') }}"></a>
                        </div>
                        <div class="list-group">
                            <a href="{{ route('manageHome') }}" class="list-group-item {{ Request::is('backstage') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-home"></i> <span class="title">Backstage</span></a>
                            <a href="{{ route('manageBuild') }}" class="list-group-item {{ Request::is('backstage/builds*') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-industry"></i> <span class="title">Builds</span></a>
                            <a href="{{ route('manageMilestone') }}" class="list-group-item {{ Request::is('backstage/milestones*') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-map-signs"></i> <span class="title">Milestones</span></a>
                            <a href="http://medium.com/changewindows" class="list-group-item list-group-item-action"><i class="fab fa-fw fa-medium"></i> <span class="title">Stories</span></a>
                            <a href="http://twitter.com/changewindows" class="list-group-item list-group-item-action"><i class="fab fa-fw fa-twitter"></i> <span class="title">Twitter</span></a>
                            <a href="http://changewindows.org/stats/index.php" class="list-group-item list-group-item-action"><i class="fal fa-fw fa-chart-pie"></i> <span class="title">Piwik</span></a>
                            <a href="{{ route('manageSettings') }}" class="list-group-item {{ Request::is('backstage/settings') ? 'active' : 'list-group-item-action' }}"><i class="fal fa-fw fa-cog"></i> <span class="title">Settings</span></a>
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
