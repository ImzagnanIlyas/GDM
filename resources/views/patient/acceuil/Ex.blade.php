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
                @include('patient.layouts.nav-dossier')
                <div class="container">
                    <div class="d-flex justify-content-center mt-2">
                        <div class="card col-12 p-0 shadow">
                            <div class="card-header d-flex justify-content-between align-items-center py-3">
                                <p class="text-primary m-0 font-weight-bold">La liste des examens</p>
                                <input class="form-control col-3" type="text" placeholder="Rechercher par date" id="searchInput">
                            </div>
                            <div class="card-body">
                                @if($examen->isEmpty())
                                    <div class=" alert alert-warning mt-4" role="alert">
                                        Ce patient n'a passé aucun examen.
                                    </div>
                                @else
                                    <div class="table-responsive table col-md-12 overflow-auto"  style="min-height: 40vh">
                                        <table class="table dataTable my-0">
                                            <thead>
                                                <tr>
                                                    <th class="col-2">Type</th>
                                                    <th class="col-2">Date</th>
                                                    <th class="col-1">Résultat</th>
                                                    <th class="col-2">Examinateur</th>
                                                    <th class="col-2">Date du résultat</th>
                                                    <th class="col-3 text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $examen as $EC )
                                                <tr>
                                                    <td>{{ json_decode($EC->bilan)->type }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($EC->created_at)) }}</td>
                                                    @if (! $EC->confirmation )
                                                    <td class="text-center" title="En attend"> <i class="fas fa-clock" style="color: orange;font-size: x-large;"></i> </td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                    <td class="d-flex justify-content-center">
                                                        <a href="{{ route('Bilan' ,[$EC->id]) }}" class="btn btn-info col-6 mr-1">Bilan</a>
                                                        <a href="" class="btn btn-primary disabled col-6 mr-1">Résultat</a>
                                                    </td>
                                                    @else
                                                    <td  class="text-center" title="Résultat ajouté"> <i class="fas fa-check-circle" style="color: green;font-size: x-large;"></i> </td>
                                                    <td> {{ $EC->examinateur->nom }}</td>
                                                    <td> {{ date('d/m/Y', strtotime($EC->updated_at)) }} </td>
                                                    <td class="d-flex justify-content-center">
                                                        <a href="{{ route('Bilan' ,[$EC->id]) }}" class="btn btn-info col-6 mr-1" >Bilan</a>
                                                        <a href="{{ route('Resultat' ,[$EC->id]) }}" class="btn btn-primary col-6 mr-1">Résultat</a>
                                                    </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $examen->links() }}
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
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
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
