<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Patient</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/untitled.css') }}">
</head>

<body>
    @include('patient.layouts.nav-horizontal')

    <div class="col-lg-8 mar">
        <div class="card z-depth-3" style="margin-top: 6rem !important">
            <div class="card-body">
                <ul class="nav nav-pills nav-pills-primary nav-justified">
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#profile" data-toggle="pill"
                            class="nav-link active show"><i class="icon-user"></i> <span
                                class="hidden-xs">Profile</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link">
                            <i class="icon-envelope-open"></i>
                            <span class="hidden-xs">Paramètres de comptes</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="tab-content p-3">
                <div class="tab-pane active show" id="profile">

                    <form>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label col">Nom</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{ $patient->nom }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label col">Prénom</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{ $patient->prenom }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label col">CIN</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{ $patient->cin }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label col">Sexe</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{ $patient->sexe }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label col">Date
                                de naissance</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="date" value="{{ $patient->ddn }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label col">Etat
                                civil</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="url" value="{{ $patient->etat_civil }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label col">Téléphone</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{ $patient->telephone }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label col">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{ $patient->adresse }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label col">Profession</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{ $patient->profession }}" readonly>
                            </div>

                        </div>


                    </form>
                </div>

                <!--/row-->


                <div class="tab-pane" id="messages">
                    @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
                    @if(session('mes'))
                    <div class="alert alert-primary" role="alert">
                        {{session('mes')}}
                    </div>
                    @endif
                    <form action="{!! route('update') !!}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label form-control-label col">Nom d'utilisateur</label>
                            <div class="col-lg-4">
                                <input class="form-control" type="text" value="{{ $patient->username }}">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-lg-4 col-form-label form-control-label col">Ancien mot de passe</label>
                            <div class="col-lg-4">
                                <input class="form-control" type="password"  name="current_password" id="current_password">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label form-control-label col">Nouveau mot de passe</label>
                            <div class="col-lg-4">
                                <input class="form-control" type="password" value="" name="pass" id="pass">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label form-control-label col">Confirmer le mot de passe </label>
                            <div class="col-lg-4">
                                <input class="form-control" type="password" value="" name="new_password" id="new_password">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <input type="submit" class="btn btn-primary" value="Mettre à jour" id="confirm" name="confirm" >
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

<style>
    .col {
        color: darkslategray;
    }

    /* User Cards */

    .mar {
        margin: auto;
    }
    .nav-pills .nav-link {
        text-align: center;
        text-transform: uppercase;
    }

</style>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="{{ asset('js/profile.min.js') }}"></script>


</html>
