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
                <hr
                    class="sidebar-divider my-0">
                    <ul class="nav navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ route('ATCD') }}">
                            <i class="far fa-clipboard"></i><span>Mon dossier médicale </span></a><a class="nav-link" href="{{ route('profile') }}">
                            <i class="far fa-id-badge"></i><span>Mon profil</span></a><a class="nav-link" href="{{ route('mescon') }}">
                            <i class="far fa-clipboard"></i><span>Mes consultations</span></a>
                            <a class="nav-link active" href="index.html"></a><a class="nav-link active" href="index.html"></a></li>
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

                <div class="containers">
                    <ul class="responsive-table">
                      <li class="table-header">
                        <div class="col col-1">Date</div>
                        <div class="col col-2">Lieu</div>
                        <div class="col col-3">Motif</div>
                        <div class="col col-4">Ordonnonce</div>
                      </li>
                      @foreach ($consultations as $con)
                      <li class="table-row">
                        <div class="col col-1" data-label="Job Id">{{$con->date}}</div>
                      <div class="col col-2" data-label="Customer Name">{{$con->lieu}}</div>
                      <div class="col col-3" data-label="Amount">{{$con->motif}}</div>
                      <div class="col col-4" data-label="Payment Status"><a href="{{route('Ord' ,[$con->id])}}">Ordonnonce</a></div>
                      </li>
                    @endforeach
                    </ul>
                  </div>


                  <div id="cover"></div>
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
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
    color:indigo;
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

  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{

    }
    li {
      display: block;
    }
    .col {

      flex-basis: 100%;

    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
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
    </div>
</body>
</html>
