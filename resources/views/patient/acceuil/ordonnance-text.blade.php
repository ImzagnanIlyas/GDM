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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        #quill-textarea2{
            border: 1px solid gray;
        }
    </style>
</head>

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
                                                <h6>{{ $consultation->id }} - {{ date("d/m/Y", strtotime($consultation->created_at)) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-12 p-0 shadow">
                            <div class="card-header d-flex justify-content-between align-items-center py-3">
                                <p class="text-primary m-0 font-weight-bold">Ordonnance</p>
                            </div>
                            <div class="card-body d-flex justify-content-center pb-0">
                                <div class="col-md-10 mb-3">
                                    <div id="quill-textarea2" style="color: black">
                                        {!! $consultation->ordonnance !!}
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="{{ asset('js/profile.min.js') }}"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var toolbarOptions2 = [];
    var quill2 = new Quill('#quill-textarea2', {
        readOnly: true,
        modules: {
            toolbar: toolbarOptions2
        },
        theme: 'bubble'
    });
</script>
</body>

</html>
