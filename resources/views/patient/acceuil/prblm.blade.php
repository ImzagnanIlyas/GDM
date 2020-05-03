<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }} :: Patient</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="{{ asset('js/script.min.js') }}"></script>
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
                @include('patient.layouts.nav-dossier')

                <div class="container">
                    <div class="d-flex flex-wrap justify-content-center mt-2">
                        <div class="card col-12 p-0 mb-3 shadow">
                            <div class="card-header d-flex justify-content-between align-items-center py-3">
                                <p class="text-primary m-0 font-weight-bold">La liste des allergies</p>
                                <input class="form-control col-3" type="text" placeholder="Rechercher par nom" id="searchInput">
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center mt-2">
                                    @php
                                 $atcd = json_decode($patient->atcd);
                                 $allergies=$atcd->allergie
                                 @endphp
                                    @if ( empty($allergies) )
                                        <div class="alert alert-warning mt-4" role="alert">
                                            Ce patient n'a pas d'allergies.
                                        </div>
                                    @else
                                        <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
                                            <table class="table dataTable my-0">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allergies as $tmp)
                                                    <tr>
                                                        <td>{{ $tmp->nom }}</td>
                                                        <td>{{ $tmp->description }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card col-12 p-0 shadow">
                            <div class="card-header d-flex justify-content-between align-items-center py-3">
                                <p class="text-primary m-0 font-weight-bold">La liste des traitements chroniques</p>
                                <input class="form-control col-3" type="text" placeholder="Rechercher par médicament" id="searchInput">
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center mt-2">
                                    @if ($TC->isEmpty())
                                        <div class="alert alert-warning mt-4" role="alert">
                                            Aucun traitement chronique pour ce patient.
                                        </div>
                                    @else
                                        <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
                                            <table class="table dataTable my-0">
                                                <thead>
                                                    <tr>
                                                        <th>Nom médicament</th>
                                                        <th>Dose</th>
                                                        <th>Rythme</th>
                                                        <th>Date Début</th>
                                                        <th>Commentaire</th>
                                                        <th>Consultation lié</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($TC as $pres)
                                                        <tr>
                                                            <td>{{$pres->nom}}</td>
                                                            <td>{{$pres->dose}}</td>
                                                            <td>{{$pres->rythme}}</td>
                                                            <td>{{ date('d/m/Y',strtotime($pres->date_debut)) }}</td>
                                                            <td>{{$pres->commentaire}}</td>
                                                            <td><a href="{{ route('detail', [ $pres->consultation->id ]) }}" class="btn btn-primary"> Consultation </a> </td>
                                                        </tr>
                                                    @endforeach
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
    </div>
    @include('patient.layouts.nav-vertical')
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="{{ asset('js/script.min.js') }}"></script>
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
        margin-left: 50px;
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
