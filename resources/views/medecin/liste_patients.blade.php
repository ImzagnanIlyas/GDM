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

    <div class="container">
        <h3 class="text-dark mb-4">Rechercher un patient</h3>

        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">CIN ENTRÉ : {{ $cin }}</p>
            </div>
            <div class="card-body">
                <div class="table-responsive table" >
                    @if ($patient == null)
                        <p> Aucun résultat, essayez de saisir un CIN valide</p>
                    @else
                        <table style="width:100%">
                            <tr>
                                <th>
                                    <a href="{{ route('nouvelle-consultation.show', ['nouvelle_consultation' => $patient->id]) }}" class="btn btn-success">Nouvelle consultation</a>
                                </th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>CIN</th>
                                <td>{{ $patient->cin }}</td>
                            </tr>
                            <tr>
                                <th>Nom</th>
                                <td>{{ $patient->nom }}</td>
                            </tr>
                            <tr>
                                <th>Prénom</th>
                                <td>{{ $patient->prenom }}</td>
                            </tr>
                            <tr>
                                <th>Naissance</th>
                                <td>{{ $patient->ddn }}</td>
                            </tr>
                            <tr>
                                <th>Sexe</th>
                                <td>{{ $patient->sexe }}</td>
                            </tr>
                            <tr>
                                <th>Téléphone</th>
                                <td>{{ $patient->telephone }}</td>
                            </tr>
                            <tr>
                                <th>Adresse</th>
                                <td>{{ $patient->adresse }}</td>
                            </tr>
                            <tr>
                                <th>Dossier médical</th>
                                <td>
                                    <a href="{{ route('medecin.dossier_ATCD', ['patient' => $patient->id]) }}">Cliquez ici pour afficher</a>
                                </td>
                            </tr>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
