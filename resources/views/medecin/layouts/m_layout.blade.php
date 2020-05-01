<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda">
    <link rel="stylesheet" href="{{ asset('css/untitled.css') }}">
    @livewireStyles
    @yield('style')
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"  style="padding-top: 4.375rem !important;">
            <div class="container-fluid d-flex flex-column p-0">
                <!-- <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ url('/medecin') }}">

                    <i class="fas fa-file-medical-alt" style="width: 30px;height: 40px;margin: 0px;padding: 0px;font-size: 36px;"></i>
                    <div class="sidebar-brand-text mx-3">
                        <span style="font-size: 36px;font-family: Merienda">
                            Milafi
                        </span>
                    </div>
                </a> -->
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ url('/medecin') }}" style="font-size: 16px;">
                            <i class="fas fa-home" style="font-size: 20px;"></i>
                            <span>Accueil</span>
                        </a>
                        <a class="nav-link active" href="{{ route('medecin.mesPatients') }}" style="font-size: 16px;">
                            <i class="fas fa-users" style="font-size: 20px;"></i>
                            <span>Mes patients</span>
                        </a>
                        <a class="nav-link active" href="{{ route('medecin.mesCons') }}" style="font-size: 16px;">
                            <i class="far fa-clipboard" style="font-size: 20px;"></i>
                            <span>Mes consultations</span>
                        </a>
                        <a class="nav-link active" href="{{ route('medecin.profil') }}" style="font-size: 16px;">
                            <i class="far fa-id-badge" style="font-size: 20px;"></i>
                            <span>Mon profil</span>
                        </a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="position: fixed;top: 0;left: 0;width: 100%;z-index: 999;">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <div class="d-flex justify-content-center align-items-center">
                        <a class="d-flex justify-content-center align-items-center logo" href="{{ url('/medecin') }}" id="logo">
                            <img src="{{ asset('img/medecin/MILAFI.png') }}" height="65">
                        </a>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <form method="GET" action="{{ route('medecin.recherche') }}" class="form-inline d-none d-sm-inline-block navbar-search">
                                <div class="input-group">
                                    <input class="bg-light form-control border-0 small" type="text" name="cin" placeholder="Entrez le CIN du patient...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary py-0" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <ul class="nav navbar-nav flex-nowrap">

                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small">{{ Auth::guard('medecin')->user()->username }}</span>
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="{{ route('medecin.profil') }}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Mon profil
                                        </a>
                                        <a class="dropdown-item" role="presentation" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Mes activités
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" role="presentation" href="{{ route('medecin.logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Se déconnecter
                                        </a>
                                        <form id="logout-form" action="{{ route('medecin.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid" style="padding-top: 6rem !important">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright">
                        <span>Copyright © Ministère de la santé 2020</span>
                        <a class="border rounded d-inline scroll-to-top" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    @livewireScripts
    @include('sweetalert::alert')
    @yield('js')
</body>

</html>
