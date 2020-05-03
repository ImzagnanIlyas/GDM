<!-- <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="{{ $patient->nom }} {{ $patient->prenom }} " readonly>
                <div class="input-group-append"></div>
            </div>
        </form>
    </div>
    <ul class="nav navbar-nav flex-nowrap ml-auto">
        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
            <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto navbar-search w-100">
                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
        </li>
        <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
        <div class="d-none d-sm-block topbar-divider"></div>
        <div class="">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('patient.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                <form id="logout-form" action="{{ route('patient.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            </a>
        </div>
        <div class="d-none d-sm-block topbar-divider"></div>
    </ul>
</nav> -->

<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="position: fixed;top: 0;left: 0;width: 100%;z-index: 999;">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
        <div class="d-flex justify-content-center align-items-center">
            <a class="d-flex justify-content-center align-items-center logo" href="{{ url('/patient/Consultations-médicales') }}" id="logo">
                <img src="{{ asset('img/patient/MILAFI.png') }}" height="65">
            </a>
        </div>
        <div class="d-none d-sm-block topbar-divider"></div>
        <div class="collapse navbar-collapse"></div>

        <ul class="nav navbar-nav flex-nowrap">
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown" role="presentation">

                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                    <span
                        class="d-none d-lg-inline mr-2 text-gray-600 small">{{ strtoupper(Auth::guard('patient')->user()->username) }}</span>
                </a>
                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                    <a class="dropdown-item" role="presentation" href="{{ route('profile') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        &nbsp;Mon profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" role="presentation" href="{{ route('patient.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        &nbsp;Se déconnecter
                    </a>
                    <form id="logout-form" action="{{ route('patient.logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </div>

            </li>
        </ul>
    </div>
</nav>
