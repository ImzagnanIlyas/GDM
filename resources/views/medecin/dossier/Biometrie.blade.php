@extends('medecin.layouts.dossier_layout')

@section('onglet')
<div class="col-md-12 d-flex justify-content-between mt-3">
    <div class="col-md-5 d-flex justify-content-start align-items-center">
        <img src="{{ asset('img/medecin/blood.png') }}" alt="Smiley face" height="50">
        <h4 class="text-dark ml-2">Groupe sanguin : <b>A+</b></h4>
    </div>
    <input class="form-control col-3" type="text" placeholder="Rechercher par date" wire:model="searchInput">
</div>
<div class="col-md-8">
    <div class="tab-content profile-tab" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table" style="margin: 15px;margin-left: 190px;">
                <head>
                    <tr>
                        <th>ID Consultation</th>
                        <th>Taille</th>
                        <th>Poids</th>
                        <th>Date</th>
                        <th>Plus</th>
                    </tr>
                </head>
                <body>
                @foreach ($vitaux as $tmp)
                    <tr>
                        <td> <a href="{{ route('medecin.consultation.showInfo', [ 'id' => Crypt::encrypt($tmp->consultation->id) ]) }}">{{ $tmp->consultation->id }}</a> </td>
                        <td>{{ $tmp->taille }}</td>
                        <td>{{ $tmp->poids }}</td>
                        <td>{{ $tmp->created_at }}</td>
                        <td> <a href="{{ route('medecin.consultation.showEG', [ 'id' => Crypt::encrypt($tmp->consultation->id) ]) }}" class="btn btn-info col-6 mr-1" ><i class="fas fa-external-link-alt"></i></a> </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
