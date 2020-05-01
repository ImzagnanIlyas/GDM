<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ url('/medecin') }}">
            <i class="fas fa-file-medical-alt" style="width: 30px;height: 40px;margin: 0px;padding: 0px;font-size: 36px;"></i>
            <div class="sidebar-brand-text mx-3">
                <span style="font-size: 36px;font-family: Merienda">
                    Milafi
                </span>
            </div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="{{ route('ATCD') }}"><i class="far fa-clipboard"></i><span>Mon dossier médicale </span></a>
                <a class="nav-link" href="{{ route('profile') }}"><i class="far fa-id-badge"></i><span>Mon profil</span></a>
                <a class="nav-link" href="{{ route('mescon') }}"><i class="far fa-clipboard"></i><span>Mes consultations</span></a>
                <a class="nav-link active" href="index.html"></a>
                <a class="nav-link active" href="index.html"></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
