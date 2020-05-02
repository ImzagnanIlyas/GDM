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
        @include('patient.layouts.nav-vertical')
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="text-white" id="content" style="width: 75;">
                @include('patient.layouts.nav-horizontal')
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

<script>
    $(document).ready(function () {

        fetch_customer_data();

        function fetch_customer_data(query = '') {
            $.ajax({
                url: "{{ route('search') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function (data) {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function () {
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>
<script>
    $('.btn-search').click(function () {
        $('.searchbar').toggleClass('clicked');
        $('.stage').toggleClass('faded');


        if ($('.searchbar').hasClass('clicked')) {
            $('.btn-extended').focus();
        }

    });
</script>


<style>
    .car {
        margin-left: 100px;
        margin-top: 20px;
        width: 850px;

    }

    .carr {
        margin-top: 0px;
        height: 100px;
        width: 100px;
    }

    .colo {
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
        height: 70px;
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


</html>
