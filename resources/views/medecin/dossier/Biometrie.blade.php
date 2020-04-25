@extends('medecin.layouts.dossier_layout')

@section('onglet')
<div class="col-md-8">
    <div class="tab-content profile-tab" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table" style="margin: 15px;margin-left: 190px;">
                <head>
                    <tr>
                        <th>ID Consultation</th>
                        <th>Taille</th>
                        <th>IMC</th>
                        <th></th>
                        <th>Groupe sanguin</th>
                        <th>Poids</th>
                    </tr>
                </head>
                <body>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

            </table>
        </div>
    </div>

@endsection
