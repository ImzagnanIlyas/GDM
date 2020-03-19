@extends('medecin.layouts.m_layout')

@section('title')
    Dossier médical
@endsection

@section('content')
    <h3 class="text-dark mb-4">Dossier médical</h3>
    <div class="card shadow">
        <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Affichage du dossier médical de {{ $patient->nom }}</p>
        </div>
        <div class="card-body">
            <div class="row">
                <nav class="navbar navbar-dark navbar-expand-md bg-info border rounded shadow m-auto visible" style="filter: brightness(106%) contrast(106%) grayscale(27%) saturate(124%) sepia(0%);">
                    <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav">
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier_ATCD', ['patient' => $patient->id]) }}" style="width: 70px;filter: saturate(100%);">ATCD</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier_Biometrie', ['patient' => $patient->id]) }}">Biométrie&nbsp;</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier_CM', ['patient' => $patient->id]) }}">Consultations médicales</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier_Ordonnances', ['patient' => $patient->id]) }}">Ordonnonces</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier_Examens', ['patient' => $patient->id]) }}">Examen</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier_Problemes', ['patient' => $patient->id]) }}">Problémes</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                @yield('onglet')

            </div>
        </div>
@endsection
