<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Patient </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/untitled.css') }}">

</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="text-white" id="content" style="width: 75;">
                @include('patient.layouts.nav-horizontal')
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-12 d-flex justify-content-center text-dark mb-3" style="margin-top: 6rem !important">
                            <div class="card col-md-6">
                                <div class="card-block">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-start align-items-center p-2">
                                                <a href="#">
                                                    <img
                                                    class="img-circle"
                                                    @if($consultation->medecin->patient->sexe === "Homme")
                                                    src="{{ asset('img/patient/doctor.png') }}"
                                                    @else
                                                    src="{{ asset('img/patient/doctore.png') }}"
                                                    @endif
                                                    style="width: 100px;height:100px;border-radius: 50%;background-color: #90DFAA;">
                                                </a>
                                            <div class="ml-3">
                                                <h5 class="font-weight-bold">
                                                    Dr.
                                                    {{ $consultation->medecin->username}}

                                                </h5>
                                                <hr style="margin:8px auto">
                                                <h6>{{ $consultation->medecin->specialite }} - {{ $consultation->medecin->inpe }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-6">
                                <div class="card-block">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-start align-items-center p-2">
                                            <a href="#">
                                                <img
                                                class="img-circle"
                                                @empty($consultation->ordonnance)
                                                src="{{ asset('img/patient/doc-no.png') }}"
                                                @else
                                                src="{{ asset('img/patient/doc-yes.png') }}"
                                                @endempty
                                                style="width: 100px;height:100px;border-radius: 50%;background-color: #90DFAA;">
                                            </a>
                                            <div class="ml-3">
                                                <h5 class="font-weight-bold">
                                                    @empty($consultation->ordonnance)
                                                    Consultation non terminée
                                                    @else
                                                    Consultation terminée
                                                    @endempty
                                                </h5>
                                                <hr style="margin:8px auto">
                                                <h6>{{ $consultation->id }} - {{ date("d/m/Y H:i", strtotime($consultation->created_at)) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card car ">
                            <div class="panel panel-primary filterable">
                                <div class="panel-heading">
                                    <div class="card-header colo">
                                        Examen spécialisé
                                    </div>
                                    <div class="pull-right dib">
                                        <button class="btn btn-default btn-xs btn-filter btn btn-primary"><span
                                                class="glyphicon glyphicon-filter"></span> Chercher</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr class="filters">
                                                <th><input type="text" class="form-control" placeholder="Date d'examen"
                                                        disabled></th>
                                                <th><input type="text" class="form-control" placeholder="Nom d'examen"
                                                        disabled></th>
                                                <th><input type="text" class="form-control" placeholder="Résultat"
                                                        disabled></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($examen as $examen)
                                                <tr>
                                                    <td>{{ $examen->created_at}}</td>
                                                    <td>{{ $examen->nom }}</td>
                                                    <td><a class="btn btn-primary @empty($examen->resultat) disabled @endempty" href="{{ route('Examenspecialise' ,[$examen->id]) }}">Résultat</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    .filterable {
        margin-top: 15px;
    }

    .filterable .panel-heading .pull-right {
        margin-top: -20px;
    }

    .filterable .filters input[disabled] {
        background-color: transparent;
        border: none;
        cursor: auto;
        box-shadow: none;
        padding: 0;
        height: auto;
    }

    .filterable .filters input[disabled]::-webkit-input-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]::-moz-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]:-ms-input-placeholder {
        color: #333;
    }

    .dib {
        margin-left: 800px;
        padding-top: 35px;
    }

    .car {
        margin-left: 60px;
        margin-top: 20px;
        width: 1000px;

    }

    .carr {
        margin-top: 0px;
        height: 100px;
        width: 100px;
    }

    .colo {
        background-color: #00D7D8;
        margin-top: -15px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="{{ asset('js/script.min.js') }}"></script>
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
<script>
    $(document).ready(function () {
        $('.filterable .btn-filter').click(function () {
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function (e) {
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function () {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();

            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' +
                    $table.find('.filters th').length + '">No result found</td></tr>'));
            }
        });
    });
</script>

</html>
