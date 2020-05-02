<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="{{$patient->nom }} {{$patient->prenom}} " readonly>
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
</nav>
