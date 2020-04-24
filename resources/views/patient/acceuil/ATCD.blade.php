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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><i class="fas fa-heartbeat" style="width: 30px;height: 41px;margin: 0px;padding: 0px;font-size: 40px;"></i><div class="sidebar-brand-text mx-3"><span>sIhati.com</span></div></a>
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
        <div class="border rounded-0 shadow-lg d-flex flex-column" id="content-wrapper">
            <div class="text-light bg-white" id="content">
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

                        <div class="container-table100">
                                <div class="table100">
                                        <table>
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="column1">Nom médicament</th>
                                                <th class="column2">Dose</th>
                                                <th class="column3">Rythme</th>
                                                <th class="column4">Durée</th>
                                                <th class="column5">Date début </th>
                                                <th class="column6">Commentaire</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pres as $pres)
                                                <tr>
                                                    <td class="column1">{{$pres->nom}}</td>
                                                    <td class="column2">{{$pres->dose}}</td>
                                                    <td class="column3">{{$pres->rythme}}</td>
                                                    <td class="column4">{{$pres->duree}}</td>
                                                    <td class="column5">{{$pres->date_debut}}</td>
                                                    <td class="column6">{{$pres->commentaire}}</td>
                                                </tr>
                                                @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                </div>
                <div class="tab-pane " id="habitude">
                    @php
                    $atcd =json_decode($patient->atcd);
                @endphp
                    <div class="link-container">
                        <h2>Sport</h2>
                        <ul>
                            @foreach($atcd->habitudes->sport as $hab)
                          <li><a href="#">{{$hab}}</a>
                            @endforeach
                        </ul>
                      </div>
                      <div class="link-container">
                        <h2>Alcool</h2>
                        <ul>
                            @foreach($atcd->habitudes->alcool as $hab)
                          <li><a href="#">{{$hab}}</a>
                            @endforeach
                        </ul>
                      </div>
                      <div class="link-container">
                        <h2>Alimentation</h2>
                        <ul>
                            @foreach($atcd->habitudes->alimentation as $hab)
                          <li><a href="#">{{$hab}}</a>
                            @endforeach
                        </ul>
                      </div>
                      <div class="link-container">
                        <h2>Tabac</h2>
                        <ul>
                            @foreach($atcd->habitudes->tabac as $hab)
                          <li><a href="#">{{$hab}}</a>
                            @endforeach
                        </ul>
                      </div>
                      <div class="link-container">
                        <h2>Autre</h2>
                        <ul>
                            @foreach($atcd->habitudes->autre as $hab)
                          <li><a href="#">{{$hab}}</a>
                            @endforeach
                        </ul>
                      </div>



                </div>
                <div role="tabpanel" class="tab-pane " id="chirurgicaux">
                    <div class="container-table100">
                        <div class="table100">
                    <table>
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">Operation</th>
                                <th class="column2">Description</th>
                                <th class="column3">Date operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $atcd =json_decode($patient->atcd);
                        @endphp
                            @foreach($atcd->chirurgicaux as $op)
                                <tr>
                                    <td class="column1">{{$op->operation}}</td>
                                    <td class="column2">{{$op->description}}</td>
                                    <td class="column3">{{$op->date_operation}}</td>

                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
                @if($patient->sexe == "F")
                <div role="tabpanel" class="tab-pane " id="Gynéco">
                    <div class="container-table100">
                        <div class="table100">
                    <table class="table" style="margin: 15px;margin-left: 10px;">
                        <head>
                            <tr class="table100-head">
                                <th>Ménarches</th>
                                <th>Ménopause</th>
                                <th>Cycle</th>
                                <th>Gestation</th>
                                <th></th>
                            </tr>
                        </head>
                        <body>
                            <tr>
                                @foreach($atcd->gyneco as $at)
                                <td>{{$at->menarches}}</td>
                                @endforeach
                            </tr>

                        </body>
                    </table>
                        </div>
                    </div>
                </div>
                @endif
                <div role="tabpanel" class="tab-pane " id="Allergie"></div>




            </div>


<style>

.link-container {
  margin-bottom: 20px;
  width: 600px;
  margin-top: 20px;
  margin-left: 40px;
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

</style>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>

</body>

</html>
