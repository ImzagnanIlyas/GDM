@extends('medecin.layouts.dossier_layout')

@section('onglet')

    @if ($n == 1)
        {{-- medicament --}}
        <div class="col-md-12 d-flex justify-content-end mt-2">
            <input class="form-control col-3" type="text" placeholder="Rechercher par médicament" wire:model="searchInput">
        </div>
        <table class="table mt-2">
            <head>
                <tr>
                    <th>Nom médicament</th>
                    <th>Dose</th>
                    <th>Rythme</th>
                    <th>Date Début</th>
                    <th>Durée</th>
                    <th>Commentaire</th>
                </tr>
            </head>
            <body>
                @foreach ($data as $pres)
                    <tr>
                        <td>{{$pres->nom}}</td>
                        <td>{{$pres->dose}}</td>
                        <td>{{$pres->rythme}}</td>
                        <td>{{ date('d/m/Y',strtotime($pres->date_debut))}}</td>
                        <td>{{$pres->duree}}</td>
                        <td>{{$pres->commentaire}}</td>
                    </tr>
                @endforeach
        </table>
        <hr>
        <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div>
    @elseif ($n == 2)
        {{-- habitude --}}
        <div class="col-md-12 d-flex justify-content-end mt-2">
            <input class="form-control col-3" type="text" placeholder="Rechercher par date" wire:model="searchInput">
        </div>
        <div class="d-flex justify-content-center mt-2">
            <table class="table ">
                <head>
                    <tr>
                        <th>Date</th>
                        <th>Sport</th>
                        <th>Alimentation</th>
                        <th>Tabac</th>
                        <th>Alcool</th>
                        <th>Autre</th>
                    </tr>
                </head>
                <body>
                @foreach ($data as $habitude)
                    <tr>
                        <td>{{ date('d/m/Y',strtotime($habitude->date)) }}</td>
                        <td>{{ $habitude->sport }}</td>
                        <td>{{ $habitude->alimentation }}</td>
                        <td>{{ $habitude->tabac }}</td>
                        <td>{{ $habitude->alcool }}</td>
                        <td>{{ $habitude->autre }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @elseif ($n == 3)
        {{-- chirurgicaux --}}
        <div class="col-md-12 d-flex justify-content-end mt-2">
            <input class="form-control col-3" type="text" placeholder="Rechercher par date" wire:model="searchInput">
        </div>
        <div class="d-flex justify-content-center mt-2">
            <table class="table">
                <head>
                    <tr>
                        <th>Nom d'opération</th>
                        <th class="col-5">Description</th>
                        <th>Date</th>
                        <th>Consultation liée</th>
                    </tr>
                </head>
                <body>
                @foreach ($data as $ch)
                    <tr>
                        <td>{{ $ch->operation }}</td>
                        <td>{{ $ch->description }}</td>
                        <td>{{ date('d/m/Y', strtotime($ch->date_operation)) }}</td>
                        <td><a href="{{ route('medecin.consultation.showInfo', [ 'id' => Crypt::encrypt($ch->id_consultation) ]) }}" class="btn btn-info col-6 mr-1" ><i class="fas fa-external-link-alt"></i></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @elseif ($n == 4)
        {{-- Gynéco --}}
        <table class="table" style="margin: 15px;margin-left: 10px;">
            <head>
                <tr>
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
