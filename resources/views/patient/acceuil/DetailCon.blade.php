<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Patient</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
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
    <div class="container">
        <div class="row">

                <div class="col-lg-8 mar">
                   <div class="card z-depth-3">
                    <div class="card-body">
                    <ul class="nav nav-pills nav-pills-primary nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#profile" ></a>
                        </li>
                        
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane active show" id="profile">

                                <form>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Motif</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{$id->motif}}" style="height:80px;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Histoire</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{$id->histoire}}" style="height:80px;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Strategis diagnostic</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{$id->strategie_diagnostique}}" style="height:80px;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Diagnostic retenu</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{$id->diagnostic_retenu}}" style="height:80px;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Compt rendu</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{$id->compte_rendu}}" style="height:80px;" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="button" class="btn btn-success" value="Examen Specialicé" onclick="location.href='{{route('Examenspecialise' ,[$id->id])}}'">
                                            <input type="button" class="btn btn-primary" value="Examen Générale" onclick="location.href='{{route('Examengeneral' ,[$id->id])}}'">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--/row-->

                        
                        
                </div>


            </div>
        </div>
    </div>
    <style>
    /* User Cards */

    .mar{
        margin-top: 10px;
        margin-left: 190px;
        width: 190px;
    }
    

    

    .profile-card-2 .card::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        left: 0px;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        height: 112px;
        background-color: #e6e6e6;
    }

    .profile-card-2 .card.profile-primary::before {
        background-color: #008cff;
    }
    .profile-card-2 .card.profile-success::before {
        background-color: #15ca20;
    }
    .profile-card-2 .card.profile-danger::before {
        background-color: #fd3550;
    }
    .profile-card-2 .card.profile-warning::before {
        background-color: #ff9700;
    }
    .profile-card-2 .user-box {
        margin-top: 30px;
    }

    .profile-card-3 .user-fullimage {
        position:relative;
    }

    .profile-card-3 .user-fullimage .details{
        position: absolute;
        bottom: 0;
        left: 0px;
        width:100%;
    }

    .profile-card-4 .user-box {
        width: 110px;
        margin: auto;
        margin-bottom: 10px;
        margin-top: 15px;
    }

    .profile-card-4 .list-icon {
        display: table-cell;
        font-size: 30px;
        padding-right: 20px;
        vertical-align: middle;
        color: #223035;
    }

    .profile-card-4 .list-details {
        display: table-cell;
        vertical-align: middle;
        font-weight: 600;
        color: #223035;
        font-size: 15px;
        line-height: 15px;
    }

    .profile-card-4 .list-details small{
        display: table-cell;
        vertical-align: middle;
        font-size: 12px;
        font-weight: 400;
        color: #808080;
    }

    /*Nav Tabs & Pills */
    .nav-tabs .nav-link {
        color: #223035;
        font-size: 12px;
        text-align: center;
        letter-spacing: 1px;
        font-weight: 600;
        margin: 2px;
        margin-bottom: 0;
        padding: 12px 20px;
        text-transform: uppercase;
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;

    }
    .nav-tabs .nav-link:hover{
        border: 1px solid transparent;
    }
    .nav-tabs .nav-link i {
        margin-right: 2px;
        font-weight: 600;
    }

    .top-icon.nav-tabs .nav-link i{
        margin: 0px;
        font-weight: 500;
        display: block;
        font-size: 20px;
        padding: 5px 0;
    }

    .nav-tabs-primary.nav-tabs{
        border-bottom: 1px solid #008cff;
    }

    .nav-tabs-primary .nav-link.active, .nav-tabs-primary .nav-item.show>.nav-link {
        color: #008cff;
        background-color: #fff;
        border-color: #008cff #008cff #fff;
        border-top: 3px solid #008cff;
    }

    .nav-tabs-success.nav-tabs{
        border-bottom: 1px solid #15ca20;
    }

    .nav-tabs-success .nav-link.active, .nav-tabs-success .nav-item.show>.nav-link {
        color: #15ca20;
        background-color: #fff;
        border-color: #15ca20 #15ca20 #fff;
        border-top: 3px solid #15ca20;
    }

    .nav-tabs-info.nav-tabs{
        border-bottom: 1px solid #0dceec;
    }

    .nav-tabs-info .nav-link.active, .nav-tabs-info .nav-item.show>.nav-link {
        color: #0dceec;
        background-color: #fff;
        border-color: #0dceec #0dceec #fff;
        border-top: 3px solid #0dceec;
    }

    .nav-tabs-danger.nav-tabs{
        border-bottom: 1px solid #fd3550;
    }

    .nav-tabs-danger .nav-link.active, .nav-tabs-danger .nav-item.show>.nav-link {
        color: #fd3550;
        background-color: #fff;
        border-color: #fd3550 #fd3550 #fff;
        border-top: 3px solid #fd3550;
    }

    .nav-tabs-warning.nav-tabs{
        border-bottom: 1px solid #ff9700;
    }

    .nav-tabs-warning .nav-link.active, .nav-tabs-warning .nav-item.show>.nav-link {
        color: #ff9700;
        background-color: #fff;
        border-color: #ff9700 #ff9700 #fff;
        border-top: 3px solid #ff9700;
    }

    .nav-tabs-dark.nav-tabs{
        border-bottom: 1px solid #223035;
    }

    .nav-tabs-dark .nav-link.active, .nav-tabs-dark .nav-item.show>.nav-link {
        color: #223035;
        background-color: #fff;
        border-color: #223035 #223035 #fff;
        border-top: 3px solid #223035;
    }

    .nav-tabs-secondary.nav-tabs{
        border-bottom: 1px solid #75808a;
    }
    .nav-tabs-secondary .nav-link.active, .nav-tabs-secondary .nav-item.show>.nav-link {
        color: #75808a;
        background-color: #fff;
        border-color: #75808a #75808a #fff;
        border-top: 3px solid #75808a;
    }

    .tabs-vertical .nav-tabs .nav-link {
        color: #223035;
        font-size: 12px;
        text-align: center;
        letter-spacing: 1px;
        font-weight: 600;
        margin: 2px;
        margin-right: -1px;
        padding: 12px 1px;
        text-transform: uppercase;
        border: 1px solid transparent;
        border-radius: 0;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
    }

    .tabs-vertical .nav-tabs{
        border:0;
        border-right: 1px solid #dee2e6;
    }

    .tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical .nav-tabs .nav-link.active {
        color: #495057;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
        border-bottom: 1px solid #dee2e6;
        border-right: 0;
        border-left: 1px solid #dee2e6;
    }

    .tabs-vertical-primary.tabs-vertical .nav-tabs{
        border:0;
        border-right: 1px solid #008cff;
    }

    .tabs-vertical-primary.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-primary.tabs-vertical .nav-tabs .nav-link.active {
        color: #008cff;
        background-color: #fff;
        border-color: #008cff #008cff #fff;
        border-bottom: 1px solid #008cff;
        border-right: 0;
        border-left: 3px solid #008cff;
    }

    .tabs-vertical-success.tabs-vertical .nav-tabs{
        border:0;
        border-right: 1px solid #15ca20;
    }

    .tabs-vertical-success.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-success.tabs-vertical .nav-tabs .nav-link.active {
        color: #15ca20;
        background-color: #fff;
        border-color: #15ca20 #15ca20 #fff;
        border-bottom: 1px solid #15ca20;
        border-right: 0;
        border-left: 3px solid #15ca20;
    }

    .tabs-vertical-info.tabs-vertical .nav-tabs{
        border:0;
        border-right: 1px solid #0dceec;
    }

    .tabs-vertical-info.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-info.tabs-vertical .nav-tabs .nav-link.active {
        color: #0dceec;
        background-color: #fff;
        border-color: #0dceec #0dceec #fff;
        border-bottom: 1px solid #0dceec;
        border-right: 0;
        border-left: 3px solid #0dceec;
    }

    .tabs-vertical-danger.tabs-vertical .nav-tabs{
        border:0;
        border-right: 1px solid #fd3550;
    }

    .tabs-vertical-danger.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-danger.tabs-vertical .nav-tabs .nav-link.active {
        color: #fd3550;
        background-color: #fff;
        border-color: #fd3550 #fd3550 #fff;
        border-bottom: 1px solid #fd3550;
        border-right: 0;
        border-left: 3px solid #fd3550;
    }

    .tabs-vertical-warning.tabs-vertical .nav-tabs{
        border:0;
        border-right: 1px solid #ff9700;
    }

    .tabs-vertical-warning.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-warning.tabs-vertical .nav-tabs .nav-link.active {
        color: #ff9700;
        background-color: #fff;
        border-color: #ff9700 #ff9700 #fff;
        border-bottom: 1px solid #ff9700;
        border-right: 0;
        border-left: 3px solid #ff9700;
    }

    .tabs-vertical-dark.tabs-vertical .nav-tabs{
        border:0;
        border-right: 1px solid #223035;
    }

    .tabs-vertical-dark.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-dark.tabs-vertical .nav-tabs .nav-link.active {
        color: #223035;
        background-color: #fff;
        border-color: #223035 #223035 #fff;
        border-bottom: 1px solid #223035;
        border-right: 0;
        border-left: 3px solid #223035;
    }

    .tabs-vertical-secondary.tabs-vertical .nav-tabs{
        border:0;
        border-right: 1px solid #75808a;
    }

    .tabs-vertical-secondary.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-secondary.tabs-vertical .nav-tabs .nav-link.active {
        color: #75808a;
        background-color: #fff;
        border-color: #75808a #75808a #fff;
        border-bottom: 1px solid #75808a;
        border-right: 0;
        border-left: 3px solid #75808a;
    }

    .nav-pills .nav-link {
        border-radius: .25rem;
        color: #223035;
        font-size: 12px;
        text-align: center;
        letter-spacing: 1px;
        font-weight: 600;
        text-transform: uppercase;
        margin: 3px;
        padding: 12px 20px;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;

    }

    .nav-pills .nav-link:hover {
        background-color:#f4f5fa;
    }

    .nav-pills .nav-link i{
        margin-right:2px;
        font-weight: 600;
    }

    .top-icon.nav-pills .nav-link i{
        margin: 0px;
        font-weight: 500;
        display: block;
        font-size: 20px;
        padding: 5px 0;
    }

    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #008cff;
        box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(0, 140, 255, 0.5);
    }

    .nav-pills-success .nav-link.active, .nav-pills-success .show>.nav-link {
        color: #fff;
        background-color: #15ca20;
        box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(21, 202, 32, .5);
    }

    .nav-pills-info .nav-link.active, .nav-pills-info .show>.nav-link {
        color: #fff;
        background-color: #0dceec;
        box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(13, 206, 236, 0.5);
    }

    .nav-pills-danger .nav-link.active, .nav-pills-danger .show>.nav-link{
        color: #fff;
        background-color: #fd3550;
        box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(253, 53, 80, .5);
    }

    .nav-pills-warning .nav-link.active, .nav-pills-warning .show>.nav-link {
        color: #fff;
        background-color: #ff9700;
        box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(255, 151, 0, .5);
    }

    .nav-pills-dark .nav-link.active, .nav-pills-dark .show>.nav-link {
        color: #fff;
        background-color: #223035;
        box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(34, 48, 53, .5);
    }

    .nav-pills-secondary .nav-link.active, .nav-pills-secondary .show>.nav-link {
        color: #fff;
        background-color: #75808a;
        box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(117, 128, 138, .5);
    }
    .card .tab-content{
        padding: 1rem 0 0 0;
    }

    .z-depth-3 {
        -webkit-box-shadow: 0 11px 7px 0 rgba(0,0,0,0.19),0 13px 25px 0 rgba(0,0,0,0.3);
        box-shadow: 0 11px 7px 0 rgba(0,0,0,0.19),0 13px 25px 0 rgba(0,0,0,0.3);
    } </style>
</body>

    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('js/profile.min.js') }}"></script>
</body>

</html>