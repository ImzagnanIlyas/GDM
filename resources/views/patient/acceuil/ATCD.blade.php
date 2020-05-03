<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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

        <div class="d-flex flex-column">
            <div class="text-white">
                @include('patient.layouts.nav-horizontal')
                @include('patient.layouts.nav-dossier')
                <div class="container">
                    <div class="d-flex justify-content-center mt-2">
                        @if ( empty($data) )
                            <div class="card col-12 p-0 shadow">
                                <div class="card-header d-flex justify-content-between align-items-center py-3">
                                    <p class="text-primary m-0 font-weight-bold">La liste des {{ $block }}</p>
                                    <input class="form-control col-3" type="text" placeholder="Rechercher par date" id="searchInput">
                                </div>
                                <div class="card-body pb-0">
                                    <div class="alert alert-warning mt-4" role="alert">
                                        Les données n'existent pas pour ce patient.
                                    </div>
                                </div>
                            </div>
                        @else
                            @if ($block === "médicaments")
                                {{-- medicament --}}
                                <div class="card col-12 p-0 shadow">
                                    <div class="card-header d-flex justify-content-between align-items-center py-3">
                                        <p class="text-primary m-0 font-weight-bold">La liste des {{ $block }}</p>
                                        <input class="form-control col-3" type="text" placeholder="Rechercher par médicament" id="searchInput">
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-center overflow-auto mt-2"  style="min-height: 40vh">
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
                                                            <td>{{ date('d/m/Y',strtotime($pres->date_debut)) }}</td>
                                                            <td>{{$pres->duree}}</td>
                                                            <td>{{$pres->commentaire}}</td>
                                                        </tr>
                                                    @endforeach
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            {{ $data->links() }}
                                        </div>
                                    </div>
                                </div>
                            @elseif ($block === "habitudes")
                                {{-- habitude --}}
                                <div class="card col-12 p-0 shadow">
                                    <div class="card-header d-flex justify-content-between align-items-center py-3">
                                        <p class="text-primary m-0 font-weight-bold">La liste des {{ $block }}</p>
                                        <input class="form-control col-3" type="text" placeholder="Rechercher par date" id="searchInput">
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-center overflow-auto mt-2"  style="min-height: 40vh">
                                            <table class="table">
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
                                    </div>
                                </div>
                            @elseif ($block === "chirurgicaux")
                                {{-- chirurgicaux --}}
                                <div class="card col-12 p-0 shadow">
                                    <div class="card-header d-flex justify-content-between align-items-center py-3">
                                        <p class="text-primary m-0 font-weight-bold">La liste des {{ $block }}</p>
                                        <input class="form-control col-3" type="text" placeholder="Rechercher par date" id="searchInput">
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-center overflow-auto mt-2"  style="min-height: 40vh">
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
                                                        <td><a href="{{ route('detail', [$ch->id_consultation]) }}" class="btn btn-info col-6 mr-1" ><i class="fas fa-external-link-alt"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($block === "Gynéco")
                                {{-- Gynéco --}}
                                <div class="card col-12 p-0 shadow">
                                    <div class="card-header d-flex justify-content-between align-items-center py-3">
                                        <p class="text-primary m-0 font-weight-bold">La liste des {{ $block }}</p>
                                        <input class="form-control col-3" type="text" placeholder="Rechercher par date" id="searchInput">
                                    </div>
                                    <div class="card-body pb-0">
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
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('patient.layouts.nav-vertical')
</body>

</html>


<style>
    .marg {
        margin-top: 20px;
        margin-left: 20px;
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

    .care {
        margin-left: 50px;
        margin-top: 40px;
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

    .link-container {
        margin-bottom: 20px;
        width: 600px;
        margin-top: 20px;
        margin-left: 150px;
    }

    .link-container h2 {
        background-color: #abd5ea;
        color: #333;
        font-size: 18px;
        line-height: 35px;
        margin: 0;
        padding-left: 10px;
    }

    .link-container ul {
        font-size: 13px;
        list-style-type: none;
        padding-left: 0;
        margin: 0;

    }

    .link-container ul li {
        background-image: url('http://i.msdn.microsoft.com/dynimg/IC688534.png');
        background-repeat: no-repeat;
        background-position: center left;
        border-bottom: #777 1px solid;
        padding-left: 20px;
        line-height: 30px;
    }

    .link-container ul li a {
        text-decoration: none;
    }

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="{{ asset('js/script.min.js') }}"></script>

</body>

</html>
