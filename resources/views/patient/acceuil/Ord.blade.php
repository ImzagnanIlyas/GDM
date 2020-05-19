<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Patient </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/resultat.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/untitled.css') }}">
</head>

<body id="page-top">


        <div class="d-flex flex-column" >
            <div class="text-white"     >
                @include('patient.layouts.nav-horizontal')
                @include('patient.layouts.nav-dossier')
                <div class="container">
                    <div class="d-flex justify-content-center mt-2">
                        <div class="card col-12 p-0 shadow">
                            <div class="card-header d-flex justify-content-between align-items-center py-3">
                                <p class="text-primary m-0 font-weight-bold">La liste des ordonnances</p>
                            </div>
                            <div class="card-body">
                                @if($consultations->isEmpty())
                                    <div class=" alert alert-warning mt-4" role="alert">
                                        Vous n'avez pas d'ordonnance.
                                    </div>
                                @else
                                    <div class="table-responsive table col-md-12 overflow-auto" style="min-height: 40vh">
                                        <table class="table dataTable my-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>ID Consultation</th>
                                                    <th>Médecin</th>
                                                    <th>Médicaments</th>
                                                    <th>Date d'ordonnance</th>
                                                    <th>Détails</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse( $consultations as $c )
                                                    <tr class="text-center">
                                                        <td>{{ $c->id }}</td>
                                                        <td>{{ $c->medecin->patient->nom.' '.$c->medecin->patient->prenom }}</td>
                                                        @if ($c->PMs->isEmpty())
                                                            <td>Cette consultation n'a pas de prescription</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                        @else
                                                            <td>{{ $c->PMs->count() }}</td>
                                                            <td>{{ date('d/m/Y',strtotime($c->PMs->first()->created_at)) }}</td>
                                                            <td><a href="{{ route('Ord-txt', ['consultation_id' => $c->id]) }}" class="btn btn-primary">Afficher</a></td>
                                                        @endif
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('patient.layouts.nav-vertical')
</body>


<style>
    .car {
        margin-left: 100px;
        margin-top: 20px;
        width: 850px;

    }

    .carr {
        margin-top: 0px;
        height: 100px;
        width: 100px;
    }

    .colo {
        background-color: #00D7D8;
    }
</style>

</html>