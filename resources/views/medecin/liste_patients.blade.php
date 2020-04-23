@extends('medecin.layouts.m_layout')

@section('title')
    Rechercher
@endsection

@section('content')
    <style>
        .card {
        width: 100%;
        }
    </style>

    <h3 class="text-dark mb-4">Rechercher un patient</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">CIN ENTRÉ : {{ $cin }}</p>
        </div>
        <div class="card-body">
            @if ($patient != null)
                <div class="row">
                    <a href="{{ route('nouvelle-consultation.show', ['nouvelle_consultation' => $patient->id]) }}" class="btn btn-success" style="margin-left: 80%">Nouvelle consultation</a>
                </div>
            @endif
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                @if ($patient == null)
                    <p> Aucun résultat, essayez de saisir un CIN valide</p>
                @else
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
                        <tr>
                            <td>{{ $patient->cin }}</td>
                            <td>{{ $patient->nom }}</td>
                            <td>{{ $patient->prenom }}</td>
                            <td>{{ $patient->ddn }}</td>
                            <td>{{ $patient->sexe }}</td>
                            <td>{{ $patient->telephone }}</td>
                            <td>{{ $patient->adresse }}</td>
                            <td>
                                <a href="{{ route('medecin.dossier_ATCD', ['patient' => $patient->id]) }}" class="btn btn-primary">Détails</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>
            <div class="row">

            </div>
        </div>
    </div>

@endsection
