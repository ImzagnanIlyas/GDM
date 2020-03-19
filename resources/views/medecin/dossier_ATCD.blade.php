@extends('medecin.layouts.dossier_layout')

@section('onglet')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="medi" aria-selected="true">Médicaments</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#habitude" role="tab" aria-controls="hab" aria-selected="false">Habitudes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#chirurgicaux" role="tab" aria-controls="chiru" aria-selected="false">Chirurgicaux</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Gynéco" role="tab" aria-controls="Gynéco" aria-selected="false">Gynéco</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="" role="tab" aria-controls="All" aria-selected="false"></a>
    </li>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <table class="table" style="margin: 15px;margin-left: 10px;">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Posologie</th>
                    <th>Voie</th>
                    <th>Rythme</th>
                    <th>Date Début </th>
                    <th>Durée</th>
                </tr>
            </head>
            <body>
                <tr>
                    <td>1</td>
                    <td>lorem ipsum</td>
                    <td>dolor sit</td>
                    <td>amet consectetur</td>
                    <td>elit</td>
                    <td>2 mois</td>
                </tr>
        </table>
    </div>
    <div role="tabpanel" class="tab-pane " id="habitude">
        <table class="table" style="margin: 15px;margin-left: 10px;">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Sport</th>
                    <th>Alimentation</th>
                    <th>Tabac</th>
                    <th>Alcool</th>
                    <th>Autre</th>
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
    <div role="tabpanel" class="tab-pane " id="chirurgicaux">
        <table class="table" style="margin: 15px;margin-left: 10px;">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Nom d'opération</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </head>
            <body>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

        </table>
    </div>
    <div role="tabpanel" class="tab-pane " id="Gynéco">
        <table class="table" style="margin: 15px;margin-left: 10px;">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Ménarches</th>
                    <th>Ménopause</th>
                    <th>Cycle</th>
                    <th>Gestation</th>
                    <th></th>
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
        <div role="tabpanel" class="tab-pane " id="Allergie">

        </div>
    </div>
</div>

@endsection
