@extends('medecin.layouts.m_layout')

@section('title')
    Rechercher
@endsection

@section('content')
    <h3 class="text-dark mb-4">Rechercher un patient</h3>
    <div class="card shadow">
        <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">CIN entré: {{ $cin }}</p>
        </div>
        <div class="card-body">
            <div class="row">

            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>CIN</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Naissance</th>
                            <th>Sexe</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($patient == null)
                            <tr><td> Aucune résultat, essayez d'entrez un CIN valide </td></tr>
                        @else
                        <tr>
                            <td>{{ $patient->cin }}</td>
                            <td>{{ $patient->nom }}</td>
                            <td>{{ $patient->prenom }}</td>
                            <td>{{ $patient->ddn }}</td>
                            <td>{{ $patient->sexe }}</td>
                            <td>{{ $patient->telephone }}</td>
                            <td>{{ $patient->adresse }}</td>
                            <td><a href="{{ route('medecin.dossier_ATCD', ['patient' => $patient->id]) }}">Détails</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="row">

            </div>
        </div>
    </div>

@endsection
