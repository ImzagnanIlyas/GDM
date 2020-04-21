@extends('medecin.layouts.m_layout')

@section('title')
    Mes consultations
@endsection

@section('content')
<style>
    .card {
      width: 100%;
    }
</style>
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">MES CONSULTATIONS</p>
        </div>
        <div class="container">
            <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 305px">
                <table class="table dataTable my-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom du patient</th>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Motif</th>
                            <th>Autres</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( Auth::guard('medecin')->user()->consultations as $c )
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->patient->nom }}</td>
                            <td>{{ $c->date }}</td>
                            <td>{{ $c->lieu }}</td>
                            <td>{{ $c->motif }}</td>
                            <td><a href="{{ route('medecin.consultation.showInfo', ['id' => $c->id]) }}" class="btn btn-primary">Détails</a></td>
                        </tr>
                        @empty
                        <tr>
                            <div class="alert alert-warning" role="alert">
                                Vous n'avez effectué aucune consultation.
                            </div>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
