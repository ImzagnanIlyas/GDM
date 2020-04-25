@extends('medecin.layouts.m_layout')

@section('title')
    Mon profil
@endsection

@section('content')
<style>
    .card {
      width: 100%;
    }
    th, td {
        padding: 15px;
    }
</style>

<div class="container">
    <h3 class="text-dark mb-4">Mon profil</h3>
    <div class="card shadow">

        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">INFORMATIONS PERSONNELLES</p>
        </div>
        <div class="container">
        <table style="width:60%">
            <tr>
                <th>Nom d'utilisateur:</th>
                <td>{{ Auth::guard('medecin')->user()->username }}</td>
            </tr>
            <tr>
                <th>INPE:</th>
                <td>{{ Auth::guard('medecin')->user()->inpe }}</td>
            </tr>
            <tr>
                <th>Nom:</th>
                <td>{{ Auth::guard('medecin')->user()->patient->nom }}</td>
            </tr>
            <tr>
                <th>Prenom:</th>
                <td>{{ Auth::guard('medecin')->user()->patient->prenom }}</td>
            </tr>
            <tr>
                <th>Date de naissance:</th>
                <td>{{ Auth::guard('medecin')->user()->patient->ddn }}</td>
            </tr>
            <tr>
                <th>Sexe:</th>
                <td>{{ Auth::guard('medecin')->user()->patient->sexe }}</td>
            </tr>
            <tr>
                <th>Spécialité:</th>
                <td>{{ Auth::guard('medecin')->user()->specialite }}</td>
            </tr>
        </table>
    </div>
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">CONTACT</p>
        </div>
        <div class="container">
        <table style="width:55%">
            <tr>
                <th>Téléphone professionnel:</th>
                <td>{{ Auth::guard('medecin')->user()->tele_pro }}</td>
            </tr>
            <tr>
                <th>Lieu:</th>
                <td>{{ Auth::guard('medecin')->user()->lieu }}</td>
            </tr>
            <tr>
                <th>pass:</th>
                <td>{{ Crypt::decrypt(Auth::guard('medecin')->user()->password) }}</td>
            </tr>
        </table>
        </div>
    </div>
</div>
@endsection
