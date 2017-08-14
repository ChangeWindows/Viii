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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome-core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome-light.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome-brands.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 cw-sidebar" id="navbar">
                <div class="contrast">
                    <div class="noise">
                        <div class="logo">
                            <a href="{{ route('home') }}"><img class="img-logo" alt="ChangeWindows logo" src="{{ asset('img/logo/logo-dark.png') }}"></a>
                        </div>
                        <div class="list-group">
                            <a href="{{ route('manageMilestone') }}" class="list-group-item list-group-item-action"><i class="fal fa-fw fa-home"></i> <span class="title">Backstage</span></a>
                            <a href="{{ route('manageBuild') }}" class="list-group-item active"><i class="fal fa-fw fa-industry"></i> <span class="title">Builds</span></a>
                            <a href="{{ route('manageMilestone') }}" class="list-group-item list-group-item-action"><i class="fal fa-fw fa-plane"></i> <span class="title">Flights</span></a>
                            <a href="{{ route('manageMilestone') }}" class="list-group-item list-group-item-action"><i class="fal fa-fw fa-ship"></i> <span class="title">Milestones</span></a>
                            <a href="{{ route('manageMilestone') }}" class="list-group-item list-group-item-action"><i class="fal fa-fw fa-bullhorn"></i> <span class="title">Stories</span></a>
                            <a href="{{ route('manageMilestone') }}" class="list-group-item list-group-item-action"><i class="fal fa-fw fa-chart-pie"></i> <span class="title">Statistics</span></a>
                            <a href="{{ route('manageMilestone') }}" class="list-group-item list-group-item-action"><i class="fal fa-fw fa-cog"></i> <span class="title">Settings</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col cw-content">
                <div class="background">
                    <div class="contrast">
                        <div class="noise">
                            <div class="jumbotron">
                                @yield( 'jumbotron' )
                                <div class="toolbar">
                                    @yield( 'toolbar' )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content container-fluid">
                    <div class="row">
                        @yield( 'content' )
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </div>
</body>
</html>
