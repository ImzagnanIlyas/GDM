<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Patient </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/untitled.css') }}">
</head>

<body id="page-top">


        <div class="d-flex flex-column">
            <div class="text-white">
                @include('patient.layouts.nav-horizontal')
                @include('patient.layouts.nav-dossier')
                <div class="container">
                    <div class="d-flex justify-content-center mt-2">
                        <div class="card col-12 p-0 shadow">
                            <div class="card-header d-flex justify-content-between align-items-center py-3">
                                <p class="text-primary m-0 font-weight-bold">La liste des consultation médicale</p>
                                <input class="form-control col-3" type="text" placeholder="Rechercher par date" id="searchInput">
                            </div>
                            <div class="card-body pb-0">
                                @if($consultations->isEmpty())
                                    <div class="alert alert-warning mt-4" role="alert">
                                        Vous n'avez passé aucune consultation.
                                    </div>
                                @else
                                    <div class="table-responsive table col-md-12 overflow-auto" style="min-height: 40vh">
                                        <table class="table dataTable my-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>ID</th>
                                                    <th class="col-3">Médecin</th>
                                                    <th>Lieu</th>
                                                    <th class="col-3">Motif</th>
                                                    <th>Date</th>
                                                    <th>Détails</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $consultations as $c )
                                                    <tr class="text-center">
                                                        <td>{{ $c->id }}</td>
                                                        <td>{{ $c->medecin->patient->nom.' '.$c->medecin->patient->prenom }}</td>
                                                        <td>{{ $c->lieu }}</td>
                                                        <td>{{ $c->motif }}</td>
                                                        <td>{{ date('d/m/Y',strtotime($c->date )) }}</td>
                                                        <td><a href="{{ route('detail' , ['id' => $c->id]) }}" class="btn btn-primary">Afficher</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $consultations->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include('patient.layouts.nav-vertical')
</body>

<style>
    .containers {
        max-width: 1000px;
        margin-left: 50px;
    }

    .responsive-table li {
        border-radius: 3px;
        padding: 13px 60px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .table-header {
        background-color: #3CB4E4;
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .table-row {
        background-color: #fff;
        box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
        color: indigo;
    }

    .col-1 {
        flex-basis: 10%;
    }

    .col-2 {
        flex-basis: 40%;
    }

    .col-3 {
        flex-basis: 25%;
    }


    .col-4 {
        flex-basis: 25%;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
    var toolbarOptions = [];
    var quill = new Quill('#quill-textarea', {
        readOnly: true,
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'bubble'
    });
</script>

</html>
