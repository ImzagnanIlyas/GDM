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
        <div class="card car ">
            <div class="card-header colo">
              Mes consultations
            </div>
            <div class="card-body">
                <br>
                <div class="stage">
                    <div class="cell">
                      <div class="searchbar">
                        <input type="date" class="btn-extended" placeholder="search" id="search" />
                        <div class="btn-search"></div>
                      </div>
                    </div>
                </div>
                     <br>
                     <br>
                            <table class="table">
                                <thead>
                                    <tr class="">
                                        <th class="">Numéro</th>
                                        <th class="">Date</th>
                                        <th class="">Lieu</th>
                                        <th class="">Détail</th>

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
<script> $('.btn-search').click(function(){
    $('.searchbar').toggleClass('clicked');
    $('.stage').toggleClass('faded');


    if($('.searchbar').hasClass('clicked')){
      $('.btn-extended').focus();
    }

}); </script>


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




.searchbar {
  position: relative;
}
.searchbar.clicked .btn-search {
  border-radius: 0 40px 40px 0;
  margin-left: 115px;
}
.searchbar.clicked .btn-extended {
  margin-left: -185px;
  width: 300px;
  padding: 20px 30px;
  opacity: 1;
  border-radius: 40px 0 0 40px;
}
.searchbar .btn-search {
  position: absolute;
  background-color: #00D7D8;
  color: white;
  width: 70px;
  height:70px;
  left: 50%;
  margin-left: -35px;
  top: 50%;
  margin-top: -35px;
  border-radius: 40px;
  cursor: pointer;
  transition: all 0.4s ease-in-out;
}
.searchbar .btn-search:before {
  position: absolute;
  content: '';
  display: block;
  top: 24px;
  left: 24px;
  width: 15px;
  height: 15px;
  border-radius: 20px;
  box-shadow: 0px 0px 0px 3px #fff;
}
.searchbar .btn-search:after {
  content: "";
  position: absolute;
  width: 15px;
  height: 4px;
  top: 42px;
  left: 37px;
  background-color: #fff;
  transform: rotateZ(45deg);
  border-radius: 3px;
}
.searchbar .btn-extended {
  position: absolute;
  width: 0px;
  height: 70px;
  left: 50%;
  margin-left: 35px;
  top: 50%;
  margin-top: -35px;
  border-radius: 40px;
  padding: 0;
  font-size: 16px;
  border: none;
  opacity: 0;
  transition: all 0.4s ease-in-out;
}
.searchbar .btn-extended:focus {
  outline-width: 0px;
}


</style>











