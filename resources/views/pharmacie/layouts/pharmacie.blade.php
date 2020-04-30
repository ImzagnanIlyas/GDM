<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">

    <!-- Styles -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('espace/pharmacie/css/styles.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('espace/pharmacie/css/settings.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('espace/pharmacie/css/theme.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    @yield('css')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<body onLoad="initClock()">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('accueil') }}"><img src="{{ asset('img/logo.png') }}" title="Sihaty" alt="Sihaty"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('pharmacie.accueil') }}"><i class="fas fa-user"></i> Mon compte</a></li>
                    <li><a href="{{ route('pharmacie.logout') }}" class="btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Se deconecte</a></li>
                    <form id="logout-form" action="{{ route('pharmacie.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <section class="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <aside class="sidebar">
                        <div class="user-profile">
                            <img src="{{ asset('espace/pharmacie/img/avatar.svg') }}" alt="avatar">
                            <h3>Pharmacie {{ Auth::guard('pharmacie')->user()->nom }}<span>{{ Auth::guard('pharmacie')->user()->adresse }}</span></h3>
                            <p>
                                <a href="{{ route('pharmacie.profil') }}"><i class="fas fa-user-cog"></i>Paramètres</a>
                                <a href="{{ route('pharmacie.mdp') }}"><i class="fas fa-key"></i>Mot de passe</a>
                            </p>
                            <!-- <a href="{{ route('pharmacie.recherche') }}" class="btn theme-btn btn-block">Rechrcher un patient</a> -->
                            <a href="#" class="btn theme-btn btn-block">Historique</a>
                        </div>
                    </aside>
                </div>

                @yield('content')

            </div>
        </div>
    </section>

    <footer>
        <div class="container text-center">
            <p><strong>Copyright &copy; 2020 <a href='{{ route('accueil') }}' target='_blank'>Sihaty</a>.</strong></p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('espace/pharmacie/js/app.js') }}"></script>
    <script src="{{ asset('espace/pharmacie/js/main.js') }}"></script>
    <script src="{{ asset('espace/pharmacie/js/theme.js') }}"></script>
    @yield('js')
</body>
</html>
