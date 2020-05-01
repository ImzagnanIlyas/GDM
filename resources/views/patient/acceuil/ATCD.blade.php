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
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ url('/medecin') }}">

                <i class="fas fa-file-medical-alt" style="width: 30px;height: 40px;margin: 0px;padding: 0px;font-size: 36px;"></i>
                <div class="sidebar-brand-text mx-3">
                    <span style="font-size: 36px;font-family: Merienda">
                        Milafi
                    </span>
                </div>
            </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('ATCD') }}"><i class="far fa-clipboard"></i><span>Mon dossier médicale </span></a>
                        <a class="nav-link" href="{{ route('profile' , $id=1) }}"><i class="far fa-id-badge"></i><span>Mon profil</span></a>
                        <a class="nav-link" href="{{ route('mescon') }}"><i class="far fa-clipboard"></i><span>Mes consultations</span></a>

                    </li>
                </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="text-white bg-white" id="content" style="width: 75;">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="{{$patient->nom }} {{$patient->prenom}} " readonly>
                                <div class="input-group-append"></div>
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-nav flex-nowrap ml-auto">
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                            </li>
                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <div class="" >
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('patient.logout') }}"
                                onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                                 <form id="logout-form" action="{{ route('patient.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i></a></div>
                                <div class="d-none d-sm-block topbar-divider"></div>
                            </li>
                </ul>
                </nav>
                <nav class="navbar navbar-dark navbar-expand-md bg-info border rounded" style="filter: brightness(106%) contrast(106%) grayscale(27%) saturate(124%) sepia(0%);padding: -42px;margin-top: 32px;margin-right: 33px;margin-bottom: 15px;margin-left: 260px; width:520px;">
                    <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only"></span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav">
                                <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ route('ATCD') }}" style="width: 70px;">ATCD</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ route('Bio') }}">Biométrie&nbsp;</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('CM') }}">Ordonnace</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('Ex') }}">Examen</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('prblm') }}">Probléme</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
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
                            @if($patient->sexe == "F")
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Gynéco" role="tab" aria-controls="Gynéco" aria-selected="false">Gynéco</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="" role="tab" aria-controls="All" aria-selected="false"></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="container">
                                    <div class="row">
                                        <div class="card car ">
                                            <div class="panel panel-primary filterable">
                                                <div class="panel-heading">
                                            <div class="card-header colo">
                                              Antécédants médicaments
                                            </div>
                                                <div class="pull-right dib">
                                                    <button class="btn btn-default btn-xs btn-filter btn btn-primary"><span class="glyphicon glyphicon-filter"></span> Chercher</button>
                                                </div>
                                                </div>
                                                <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Nom médicament" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Dose" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Rythme" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Durée" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Date début" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Commentaire" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ( empty($pres) )
        <div class="alert alert-warning mt-4" role="alert">
            Les données n'existent pas pour ce patient.
        </div>
    @else
                                                    @foreach ($pres as $pres)
                                                    <tr>
                                                        <td>{{$pres->nom}}</td>
                                                        <td>{{$pres->dose}}</td>
                                                        <td>{{$pres->rythme}}</td>
                                                        <td>{{$pres->duree}}</td>
                                                        <td>{{$pres->date_debut}}</td>
                                                        <td>{{$pres->commentaire}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>

                            </div>
                            <div class="tab-pane " id="habitude">
                                @php
                                $atcd =json_decode($patient->atcd);
                            @endphp
                            <div class="card care ">
                                <div class="card-header colo">
                                    Mes habitudes
                                  </div>
                            <ul class="nav nav-tabs marg" id="myTab" role="tablist" style="">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#sport" role="tab" aria-controls="medi" aria-selected="true">Sport</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#alcool" role="tab" aria-controls="hab" aria-selected="false">Alcool</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#alimentation" role="tab" aria-controls="chiru" aria-selected="false">Alimentation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tabac" role="tab" aria-controls="hab" aria-selected="false">Tabac</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#autre" role="tab" aria-controls="chiru" aria-selected="false">Autre</a>
                                </li>
                            </ul>

                                  <div class="tab-content">
                                  <div class="tab-pane " id="sport">
                                <div class="link-container">
                                    <h2>Sport</h2>
                                    <ul>
                                        @foreach($atcd->habitudes->sport as $hab)
                                      <li><a href="#">{{$hab}}</a></li>
                                        @endforeach
                                    </ul>
                                  </div>
                                  </div>
                                  <div class="tab-pane " id="alcool">
                                  <div class="link-container">
                                    <h2>Alcool</h2>
                                    <ul>
                                        @foreach($atcd->habitudes->alcool as $hab)
                                      <li><a href="#">{{$hab}}</a></li>
                                        @endforeach
                                    </ul>
                                  </div>
                                  </div>
                                  <div class="tab-pane " id="alimentation">
                                  <div class="link-container">
                                    <h2>Alimentation</h2>
                                    <ul>
                                        @foreach($atcd->habitudes->alimentation as $hab)
                                      <li><a href="#">{{$hab}}</a></li>
                                        @endforeach
                                    </ul>
                                  </div>
                                  </div>
                                  <div class="tab-pane " id="tabac">
                                  <div class="link-container">
                                    <h2>Tabac</h2>
                                    <ul>
                                        @foreach($atcd->habitudes->tabac as $hab)
                                      <li><a href="#">{{$hab}}</a></li>
                                        @endforeach
                                    </ul>
                                  </div>
                                  </div>
                                  <div class="tab-pane " id="autre">
                                  <div class="link-container">
                                    <h2>Autre</h2>
                                    <ul>
                                        @foreach($atcd->habitudes->autre as $hab)
                                      <li><a href="#">{{$hab}}</a></li>
                                        @endforeach
                                    </ul>
                                  </div>
                                  </div>
                            </div>
                            </div>

                            </div>
                            <div role="tabpanel" class="tab-pane " id="chirurgicaux">
                                <div class="container">
                                    <div class="row">
                                        <div class="card car ">
                                            <div class="panel panel-primary filterable">
                                                <div class="panel-heading">
                                            <div class="card-header colo">
                                              Antécédants chirurgicaux
                                            </div>
                                                <div class="pull-right dib">
                                                    <button class="btn btn-default btn-xs btn-filter btn btn-primary"><span class="glyphicon glyphicon-filter"></span> Chercher</button>
                                                </div>
                                                </div>
                                                <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Nom opération" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Date opération" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $atcd =json_decode($patient->atcd);
                                                    $data=$atcd->chirurgicaux;
                                                @endphp
                                                @if ( empty($data) )
                                                <div class="alert alert-warning mt-4" role="alert">
                                                    Les données n'existent pas pour ce patient.
                                                </div>
                                            @else
                                                @foreach($data as $op)
                                                    <tr>
                                                        <td>{{$op->operation}}</td>
                                                        <td>{{$op->date_operation}}</td>
                                                        <td>{{$op->description}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane " id="Gynéco">
                                <div class="container">
                                    <div class="row">
                                        <div class="card car ">
                                            <div class="panel panel-primary filterable">
                                                <div class="panel-heading">
                                            <div class="card-header colo">
                                              Gynéco
                                            </div>
                                                <div class="pull-right dib">
                                                    <button class="btn btn-default btn-xs btn-filter btn btn-primary"><span class="glyphicon glyphicon-filter"></span> Chercher</button>
                                                </div>
                                                </div>
                                                <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Ménarches" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Ménopause" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Cycle" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Gestation" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($patient->sexe == "F")
                                                    @php
                                                    $atcd =json_decode($patient->atcd);
                                                    $data=$atcd->gyneco;
                                                @endphp

                                                @if ( empty($data) )
                                                <div class="alert alert-warning mt-4" role="alert">
                                                    Les données n'existent pas pour ce patient.
                                                </div>
                                            @else
                                                    @foreach($data as $at)
                                                    <tr>
                                                        <td>{{$at->menarches}}</td>
                                                        <td>{{$at->menopause}}</td>
                                                        <td>{{$at->cycle}}</td>
                                                        <td>{{$at->gestation}}<</td>
                                                    </tr>
                                                 @endforeach
                                                 @endif
                                                 @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane " id="Allergie"></div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>


<style>
    .marg{
        margin-top: 20px;
        margin-left: 20px;
    }
    .dib{
        margin-left: 800px;
        padding-top: 35px;
    }
.car{
    margin-left: 50px;
    margin-top: 20px;
    width:1000px;

}
.care{
    margin-left: 50px;
    margin-top: 40px;
    width:1000px;

}
.carr{
    margin-top: 0px;
    height: 100px;
    width: 100px;
}
.colo{
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

.link-container ul li{
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

$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
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

    $('.filterable .filters input').keyup(function(e){
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
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();

        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
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
