<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Patient</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
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
        <div class="container box">
                <div class="search">
                    <div class="panel panel-default">
                        <div class="panel-body">
                    <div class="space"></div>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                        <input autocomplete="off" id="search"  type="text" class="form-control " placeholder="Entrez la date de consultation" style="margin-top:30px; margin-left:190px;">
                                </div>
                            </div>
                        </div>
                        <div class="space"></div>
                    </form>
                        </div>
                    </div>
                </div>
                <div class="container-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th class="column3">Numéro</th>
                                    <th class="column2">Date</th>
                                    <th class="column3">Lieu</th>
                                    <th class="column3">Détail</th>

                                </tr>
                            </thead>
                <tbody>
                 

                </tbody>
               </table>
              </div>
           </div>
    </div>
    </div>

</div>
</body>
</html>
<script>
    $(document).ready(function(){

     fetch_customer_data();

     function fetch_customer_data(query = '')
     {
      $.ajax({
       url:"{{ route('search') }}",
       method:'GET',
       data:{query:query},
       dataType:'json',
       success:function(data)
       {
        $('tbody').html(data.table_data);
        $('#total_records').text(data.total_data);
       }
      })
     }

     $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_customer_data(query);
     });
    });
    </script>



<style>

</style>











