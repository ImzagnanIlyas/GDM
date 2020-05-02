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
        @include('patient.layouts.nav-vertical')
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="text-white bg-white" id="content" style="width: 75;">
                @include('patient.layouts.nav-horizontal')

            @include('patient.layouts.nav-dossier')

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
