<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Patient </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><i class="fas fa-heartbeat" style="width: 30px;height: 41px;margin: 0px;padding: 0px;font-size: 40px;"></i><div class="sidebar-brand-text mx-3"><span>sIhati.com</span></div></a>
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
        <div class="border rounded-0 shadow-lg d-flex flex-column" id="content-wrapper">
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
                <div class="col-md-12">
                    <h2> Examen Complimentaire</h2>
                    <hr>
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container-table100">
                            <div class="table100">
                                <table>
                                    <thead>
                                        <tr class="table100-head">
                                            <th class="column1">Date de l'examen</th>
                                            <th class="column2">Bilan</th>
                                            <th class="column3">Résultat</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($examen as $examen)
                                        <tr>
                                            <td class="column1">{{$examen->consultation->date}}</td>
                                        <td class="column2"><a href="{{route('Bilan' ,[$examen->id])}}">Bilan</a></td>
                                            <td class="column3"><a href="{{route('Resultat' ,[$examen->id])}}">Résultat</a></td>
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
        <style>  #cover {
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0,0,0,0.6);
            z-index: 5;
            width: 100%;
            height: 100%;
            display: none;
        }

        #popupScreen {
            height: 1000px;
            width: 780px;
            margin-top: -470px;
            margin-left: 60px;
            position: relative;
            z-index: 10;
            display: none;
            background: url(login.png) no-repeat;
            border: 5px solid #cccccc;
            border-radius: 10px;
            background-color:rgb(245,245,245);
        }

            #popupScreen:target, #popupScreen:target + #cover {
                display: block;
                opacity: 2;
            }

        .cancel {
            display: block;
            position: absolute;
            top: 3px;
            right: 2px;
            background: rgb(245,245,245);
            color: black;
            height: 30px;
            width: 35px;
            font-size: 30px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
        } </style>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <script> baguetteBox.run('.tz-gallery');
        var toolbarOptions = [];
        var quill = new Quill('#quill-textarea', {
            readOnly: true,
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'bubble'
        }); </script>
</body>

</html>
