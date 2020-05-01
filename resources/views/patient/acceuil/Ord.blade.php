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
        @include('patient.layouts.nav-vertical')
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="text-white bg-white" id="content" style="width: 75;">
                @include('patient.layouts.nav-horizontal')

            <div class="text-light bg-white" id="content">
                @include('patient.layouts.nav-dossier')
                <div class="card car ">
                    <div class="card-header colo">
                      Ordonnace
                    </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <div id="quill-textarea" style="color: black">
                            {!! $id->ordonnance !!}
                        </div>
                    </div>
                </div>


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
    .car{
    margin-left: 100px;
    margin-top: 20px;
    width:850px;

}
.carr{
    margin-top: 0px;
    height: 100px;
    width: 100px;
}
.colo{
background-color: #00D7D8;
}
    </style>
</body>
</html>
