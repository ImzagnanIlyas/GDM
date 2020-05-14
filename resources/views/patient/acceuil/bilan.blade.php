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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        #quill-textarea{
            border: 1px solid gray;
        }
    </style>
</head>
@php
    $bilan = json_decode($examen->bilan)
@endphp
<body id="page-top">
    <div>
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="text-white" id="content">
                @include('patient.layouts.nav-horizontal')
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-12 d-flex justify-content-center text-dark mb-3" style="margin-top: 6rem !important">
                            <div class="card col-md-6">
                                <div class="card-block">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-start align-items-center p-2">
                                                <a href="#">
                                                    <img
                                                    class="img-circle"
                                                    @if($consultation->medecin->patient->sexe === "Homme")
                                                    src="{{ asset('img/patient/doctor.png') }}"
                                                    @else
                                                    src="{{ asset('img/patient/doctore.png') }}"
                                                    @endif
                                                    style="width: 100px;height:100px;border-radius: 50%;background-color: #90DFAA;">
                                                </a>
                                            <div class="ml-3">
                                                <h5 class="font-weight-bold">
                                                    Dr.
                                                    {{ strtoupper($consultation->medecin->username) }}

                                                </h5>
                                                <hr style="margin:8px auto">
                                                <h6>{{ $consultation->medecin->specialite }} - {{ $consultation->medecin->inpe }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-6">
                                <div class="card-block">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-start align-items-center p-2">
                                            <a href="#">
                                                <img
                                                class="img-circle"
                                                @empty($consultation->ordonnance)
                                                src="{{ asset('img/patient/doc-no.png') }}"
                                                @else
                                                src="{{ asset('img/patient/doc-yes.png') }}"
                                                @endempty
                                                style="width: 100px;height:100px;border-radius: 50%;background-color: #90DFAA;">
                                            </a>
                                            <div class="ml-3">
                                                <h5 class="font-weight-bold">
                                                    @empty($consultation->ordonnance)
                                                    Consultation non terminée
                                                    @else
                                                    Consultation terminée
                                                    @endempty
                                                </h5>
                                                <hr style="margin:8px auto">
                                                <h6>{{ $consultation->id }} - {{ date("d/m/Y H:i", strtotime($consultation->created_at)) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-12 p-0 shadow">
                            <div class="card-header d-flex justify-content-between align-items-center py-3">
                                <p class="text-primary m-0 font-weight-bold">Bilan de l'examen complémentaire ({{$examen->id}})</p>
                            </div>
                            <div class="card-body d-flex justify-content-center pb-0">
                                <div class="col-md-10 mb-3">
                                    <div id="quill-textarea" style="color: black">
                                        {!! $bilan->text !!}
                                    </div>
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

<style>
    .dib {
        margin-left: 800px;
        padding-top: 35px;
    }

    .car {
        margin-left: 70px;
        width: 1000px;

    }

    .ca {

        width: 1000px;

    }

    .carr {
        margin-top: 0px;
        height: 100px;
        width: 100px;
    }

    .col {
        background-color: #00D7D8;

    }

    .colo {
        color: indigo;
    }

    .mar {

        margin-left: 190px;
        width: 190px;
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

</html>
