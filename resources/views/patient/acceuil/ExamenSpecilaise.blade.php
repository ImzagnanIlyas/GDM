<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Patient </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="{{ asset('css/resultat.css') }}">
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


                @php
                foreach($examenspecialise as $examen){
                $resultat = json_decode($id->resultat);
                $data=$resultat->type;}
            @endphp
<div class="card care ">
    <div class="card-header colo">
        Résultat d'examen spécialicé
      </div>
      @if ( empty($data) )
      <div class="alert alert-warning mt-4" role="alert">
          Les données n'existent pas pour ce patient.
      </div>
     @else
            @if ( $resultat->type === 'text' )
                <div class="col-md-10">
                    <div class="card-body">
                        <div id="quill-textarea" style="color: black">
                            {!! $resultat->text !!}
                        </div>
                    </div>
                </div>
            @elseif ( $resultat->type === 'pdf')
                @php $i = 1; @endphp
                <ul id="files">
                    @foreach ( $resultat->pdf as $pdf )
                        <li>
                            <a href="{{ route('medecin.consultation.ExamSpecialResultat.PDF', [ 'consultation_id' => $consultation->id, 'examen_id' => $examen->id, 'i' => $i ]) }}" target="_blank" class="file_link">
                                <div class="link_icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="details">
                                    <div class="application/pdf">
                                        <h4>PDF {{ $i }}</h4>
                                        <small><span class="file_size">{{  ceil(File::size(public_path('storage/'.$pdf))/(1024)) }} Ko</span></small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @php $i++; @endphp
                    @endforeach
                </ul>
            @elseif ( $resultat->type === 'image')
                <div class="tz-gallery">
                    <div class="row">
                        @foreach ( $resultat->image as $image )
                            <div class="col-sm-6 col-md-4">
                                <a class="lightbox" href="{{ asset('storage/'.$image) }}">
                                    <img src="{{ asset('storage/'.$image) }}" alt="Resultat">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @elseif ( $resultat->type === 'video')
                <div class="row justify-content-around">
                    @foreach ( $resultat->video as $video )
                        <div class="col-sm-6 col-md-6">
                            <video width="100%" controls>
                                <source src="{{ asset('storage/'.$video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
            @elseif ( $resultat->type === 'audio')
                @php $i = 1; @endphp
                <ul id="audio" class="flex-column bd-highlight mb-3">
                    @foreach ( $resultat->audio as $audio )
                        <li>
                            <div class="audio_link">
                                <div class="link_icon">
                                    <i class="fas fa-file-audio"></i>
                                </div>
                                <div class="details">
                                    <div class="application/pdf">
                                        <h4>Audio {{ $i }}</h4>
                                        <audio controls>
                                            <source src="{{ asset('storage/'.$audio) }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @php $i++; @endphp
                    @endforeach
                </ul>
            @endif
@endif
            </div>
        </div>
    </div>

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
    <style>
    .care{
    margin-left: 60px;
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
    .container.gallery-container {
        background-color: #fff;
        color: #35373a;
        min-height: 100vh;
        border-radius: 20px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.06);
    }

    .gallery-container h1 {
        text-align: center;
        margin-top: 70px;
        font-family: 'Droid Sans', sans-serif;
        font-weight: bold;
    }

    .gallery-container p.page-description {
        text-align: center;
        max-width: 800px;
        margin: 25px auto;
        color: #888;
        font-size: 18px;
    }

    .tz-gallery {
        padding: 40px;
    }

    .tz-gallery .lightbox img {
        width: 100%;
        margin-bottom: 30px;
        transition: 0.2s ease-in-out;
        box-shadow: 0 2px 3px rgba(0,0,0,0.2);
    }


    .tz-gallery .lightbox img:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 15px rgba(0,0,0,0.3);
    }

    .tz-gallery img {
        border-radius: 4px;
    }

    .baguetteBox-button {
        background-color: transparent !important;
    }


    @media(max-width: 768px) {
        body {
            padding: 0;
        }

        .container.gallery-container {
            border-radius: 0;
        }
    }

    #files {
     display:-webkit-box;
     display:flex;
     list-style:none;
     width:100%;
     margin:0;
     flex-wrap:wrap;
     padding:10px;
     position:relative;
     -webkit-touch-callout:none;
     -webkit-user-select:none;
     -moz-user-select:none;
     -ms-user-select:none;
     user-select:none
    }
    #files li {
     -webkit-box-flex:1;
     flex:1;
     width:100%;
     min-width:200px;
     max-width:250px
    }
    #files #audio {
     min-width: 100%;
     max-width: 100%;
    }
    #files li .file_link {
     background: #eee;
     color: gray;
     padding:10px;
     margin:10px;
     cursor:pointer;
     border-radius:3px;
     border:1px solid gray;
     overflow:hidden;
     background:#f6f8f9;
     display:-webkit-box;
     display:flex
    }
    #files li .file_link .details {
     -webkit-box-flex:2;
     flex:2;
     overflow:hidden;
     width:100%
    }
    #files li .file_link .details small {
     font-size:11px;
     position:relative;
     top:-3px
    }
    #files li .file_link .link_icon {
     -webkit-box-flex:1;
     flex:1
    }
    #files li .file_link.selected,
    #files li .file_link:hover {
     background:#4da7e8!important;
     border-color:#2581b8;
     color:#fff
    }
    #files li .file_link.selected h4,
    #files li .file_link:hover h4 {
     color:#fff
    }
    #files li .details h4 {
     margin-bottom:2px;
     margin-top:10px;
     max-height:17px;
     height:17px;
     overflow:hidden;
     font-size:14px;
     text-overflow:ellipsis
    }
    #files li .details .folder h4 {
     margin-top:16px
    }
    .file_link.folder i.icon {
     float:left;
     margin-left:10px
    }
    .file_link.folder .num_items {
     display:block
    }
    .file_link .link_icon {
     text-align:center;
     padding-left:0;
     margin-left:0;
     margin-right:5px
    }
    .file_link .link_icon i {
     padding-left:0;
     padding-right:0;
     position:relative;
     top:5px
    }
    .file_link i.fas:before {
     font-size:40px
    }


    audio{
        width: 100%;
    }

    #audio {
     display:-webkit-box;
     display:flex;
     list-style:none;
     width:100%;
     margin:0;
     flex-wrap:wrap;
     padding:10px;
     position:relative;
     -webkit-touch-callout:none;
     -webkit-user-select:none;
     -moz-user-select:none;
     -ms-user-select:none;
     user-select:none
    }
    #audio li {
     -webkit-box-flex:1;
     flex:1;
     width:100%;
    }
    #audio li .audio_link {
     background: #eee;
     color: gray;
     padding:10px;
     margin:10px;
     cursor:pointer;
     border-radius:3px;
     border:1px solid gray;
     overflow:hidden;
     background:#f6f8f9;
     display:-webkit-box;
     display:flex
    }
    #audio li .audio_link .details {
     -webkit-box-flex:2;
     overflow:hidden;
     width:100%
    }
    #audio li .audio_link .details small {
     font-size:11px;
     position:relative;
     top:-3px
    }
    #audio li .audio_link .link_icon {
     -webkit-box-flex:1;
     flex:1
    }
    #audio li .audio_link.selected,
    #audio li .audio_link:hover {
     background:#4da7e8!important;
     border-color:#2581b8;
     color:#fff
    }
    #audio li .audio_link.selected h4,
    #audio li .audio_link:hover h4 {
     color:#fff
    }
    #audio li .details h4 {
     margin-bottom:5px;
     margin-top:10px;
     max-height:17px;
     height:17px;
     overflow:hidden;
     font-size:18px;
     text-overflow:ellipsis
    }
    #audio li .details .folder h4 {
     margin-top:16px
    }

    .audio_link.folder i.icon {
     float:left;
    }
    .audio_link.folder .num_items {
     display:block
    }
    .audio_link .link_icon {
     text-align:center;
     padding-left:0;
     margin-left:1%;
     margin-right:2%;
    }
    .audio_link .link_icon i {
     padding-left:0;
     padding-right:0;
     position:relative;
     top: 20%;
    }
    .audio_link i.fas:before {
     font-size:45px
    }
    </style>

</body>
</html>