@extends('medecin.layouts.m_layout')

@section('title')
    Dossier médical
@endsection

@section('content')
<style>
    .card {
      width: 100%;
    }
</style>
<div class="container">
    <h3 class="text-dark mb-4">Dossier médical</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Affichage du dossier médical de {{ $patient->nom }}</p>
        </div>
        <div class="card-body">
            <nav class="navbar navbar-dark navbar-expand bg-info rounded justify-content-center">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">Antécédant</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('medecin.dossier.ATCD', ['patient' => $patient->id, 'n' => 1]) }}">Médicaments</a>
                            <a class="dropdown-item" href="{{ route('medecin.dossier.ATCD', ['patient' => $patient->id, 'n' => 2]) }}">Habitudes</a>
                            <a class="dropdown-item" href="{{ route('medecin.dossier.ATCD', ['patient' => $patient->id, 'n' => 3]) }}">Chirurgicaux</a>
                            @if($patient->sexe == "F")<a class="dropdown-item" href="{{ route('medecin.dossier.ATCD', ['patient' => $patient->id, 'n' => 4]) }}">Gynéco</a>@endif
                        </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.Biometrie', ['patient' => $patient->id]) }}">Biométrie</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.CM', ['patient' => $patient->id]) }}">Consultations médicales</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.Ordonnances', ['patient' => $patient->id]) }}">Ordonnonces</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.Examens', ['patient' => $patient->id]) }}">Examen</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.Problemes', ['patient' => $patient->id]) }}">Problémes</a></li>
                </ul>
            </nav>

            @yield('onglet')
        </div>
    </div>
</div>
@endsection
