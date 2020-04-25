@extends('medecin.layouts.dossier_layout')

@section('onglet')

    @if ($n == 1)
        {{-- medicament --}}
        <table class="table" style="margin: 15px;margin-left: 10px;">
            <head>
                <tr>
                    <th>Nom médicament</th>
                    <th>Dose</th>
                    <th>Rythme</th>
                    <th>Date Début </th>
                    <th>Durée</th>
                    <th>Commentaire</th>
                </tr>
            </head>
            <body>
                @foreach ($prescriptions as $pres)
                    <tr>
                        <td>{{$pres->nom}}</td>
                        <td>{{$pres->dose}}</td>
                        <td>{{$pres->rythme}}</td>
                        <td>{{$pres->duree}}</td>
                        <td>{{$pres->date_debut}}</td>
                        <td>{{$pres->commentaire}}</td>
                    </tr>
                @endforeach
        </table>
    @elseif ($n == 2)
        {{-- habitude --}}
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
    @elseif ($n == 3)
        {{-- chirurgicaux --}}
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
    @elseif ($n == 4)
        {{-- Gynéco --}}
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

    @elseif ($n == 5)
        {{-- Allergie --}}
    @endif


@endsection
