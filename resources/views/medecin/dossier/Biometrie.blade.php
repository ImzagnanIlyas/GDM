@extends('medecin.layouts.dossier_layout')

@section('onglet')
<div class="col-md-12 d-flex justify-content-between mt-3">
    <div class="col-md-5 d-flex justify-content-start align-items-center">
        <img src="{{ asset('img/medecin/blood.png') }}" alt="Smiley face" height="50">
        <h4 class="text-dark ml-2">Groupe sanguin : <b>A+</b></h4>
    </div>
    <input class="form-control col-3" type="text" placeholder="Rechercher par date" id="searchInput">
</div>
<div class="col-md-12 d-flex justify-content-center mt-3">
    @if ($vitaux->isEmpty())
        <div class="alert alert-warning mt-4" role="alert">
            Aucune donnée n'existe pour ce patient
        </div>
    @else
        <div class="table-responsive table col-md-9 overflow-auto" style="max-height: 430px">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Consultation</th>
                        <th>Taille</th>
                        <th>Poids</th>
                        <th>Date</th>
                        <th>Plus</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($vitaux as $tmp)
                    <tr>
                        <td> <a href="{{ route('medecin.consultation.showInfo', [ 'id' => Crypt::encrypt($tmp->consultation->id) ]) }}">{{ $tmp->consultation->id }}</a> </td>
                        <td>{{ $tmp->taille }}</td>
                        <td>{{ $tmp->poids }}</td>
                        <td>{{ $tmp->created_at }}</td>
                        <td> <a href="{{ route('medecin.consultation.showEG', [ 'id' => Crypt::encrypt($tmp->consultation->id) ]) }}" class="btn btn-info col-6 mr-1" ><i class="fas fa-external-link-alt"></i></a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
