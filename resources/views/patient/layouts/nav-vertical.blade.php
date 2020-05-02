<!-- <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="padding-top: 4.375rem !important;">
    <div class="container-fluid d-flex flex-column p-0">
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
</nav> -->

@php
    use Illuminate\Support\Facades\Request;
    $active = Request::segment(2);
@endphp

<style>
    .active-nav-item{
        border-radius: 0px 20px 20px 0px;
        -moz-border-radius: 0px 20px 20px 0px;
        -webkit-border-radius: 0px 20px 20px 0px;
        border: 1px solid #ffffff;
        background-color: white;
    }
    .active-nav-item a{
        color: #36cc7a !important;
    }
</style>

<div>

<div class="card shadow border-info" style="margin-top: 6rem;margin-left: -1rem;height: 4.1rem">
    <div class="card-body ml-4">
        <div class="row">
            <div class="text-info">
                <h5 class="card-text font-weight-bold">Dossier médicale</h5>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-dark align-items-center sidebar sidebar-dark bg-gradient-success p-0" style="margin-top: 5rem !important;min-height: 0vh;border-radius: 0px 20px 20px 0px;height: 22rem;">
    <div class="container-fluid d-flex flex-column p-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item col-9 @if($active === 'Antécédents') active-nav-item @endif" role="presentation">
                <a class="nav-link" href="{{ route('ATCD') }}">Antécédents</a>
            </li>
            <li class="nav-item col-9 @if($active === 'Biométrie') active-nav-item @endif" role="presentation">
                <a class="nav-link" href="{{ route('Bio') }}">Biométrie&nbsp;</a>
            </li>
            <li class="nav-item col-9 @if($active === 'Consultations-médicales') active-nav-item @endif" role="presentation">
                <a class="nav-link" href="{{ route('CM') }}">Consultations médicales</a>
            </li>
            <li class="nav-item col-9 @if($active === 'Ordonnances') active-nav-item @endif" role="presentation">
                <a class="nav-link" href="{{ route('Ord') }}">Ordonnances</a>
            </li>
            <li class="nav-item col-9 @if($active === 'Examens') active-nav-item @endif" role="presentation">
                <a class="nav-link" href="{{ route('Examens') }}">Examens</a>
            </li>
            <li class="nav-item col-9 @if($active === 'Problèmes') active-nav-item @endif" role="presentation">
                <a class="nav-link" href="{{ route('prblm') }}">Problèmes</a>
            </li>
        </ul>
    </div>
</nav>

</div>
