@extends('medecin.layouts.m_layout')

@section('title')
    Dossier médical
@endsection

@section('content')
<style>
    .card {
      width: 100%;
    }
    .active-nav-item{
        border-radius: 0px 50px 50px 50px;
        -moz-border-radius: 0px 50px 50px 50px;
        -webkit-border-radius: 0px 0px 20px 20px;
        border: 1px solid #ffffff;
        background-color: white;
    }
    .active-nav-item a{
        color: #36b9cc !important;
    }
</style>
@php
use Illuminate\Support\Facades\Request;
$active = Request::segment(4);
@endphp
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Affichage du dossier médical de {{ $patient->nom }}</p>
        </div>
        <div class="card-body">
            <nav class="navbar navbar-dark navbar-expand bg-info rounded justify-content-center">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown @if($active === 'ATCD') active-nav-item @endif">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">Antécédant</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('medecin.dossier.ATCD', ['patient_id' => Crypt::encrypt($patient->id), 'n' => 1]) }}">Médicaments</a>
                            <a class="dropdown-item" href="{{ route('medecin.dossier.ATCD', ['patient_id' => Crypt::encrypt($patient->id), 'n' => 2]) }}">Habitudes</a>
                            <a class="dropdown-item" href="{{ route('medecin.dossier.ATCD', ['patient_id' => Crypt::encrypt($patient->id), 'n' => 3]) }}">Chirurgicaux</a>
                            @if($patient->sexe == "Femme")<a class="dropdown-item" href="{{ route('medecin.dossier.ATCD', ['patient_id' => Crypt::encrypt($patient->id), 'n' => 4]) }}">Gynéco</a>@endif
                        </div>
                    </li>
                    <li class="nav-item @if($active === 'Biometrie') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.Biometrie', ['patient_id' => Crypt::encrypt($patient->id)]) }}">Biométrie</a></li>
                    <li class="nav-item @if($active === 'CM') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.CM', ['patient_id' => Crypt::encrypt($patient->id)]) }}">Consultations médicales</a></li>
                    <li class="nav-item @if($active === 'Ordonnances') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.Ordonnances', ['patient_id' => Crypt::encrypt($patient->id)]) }}">Ordonnonces</a></li>
                    <li class="nav-item @if($active === 'Examens') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.Examens', ['patient_id' => Crypt::encrypt($patient->id)]) }}">Examens</a></li>
                    <li class="nav-item @if($active === 'Problemes') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.dossier.Problemes', ['patient_id' => Crypt::encrypt($patient->id)]) }}">Problémes</a></li>
                </ul>
            </nav>

            @yield('onglet')
        </div>
    </div>
</div>
@endsection
