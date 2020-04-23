@extends('pharmacie.layouts.pharmacie')

@section('title')
    Recherche
@endsection



@section('css')
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('espace/pharmacie/table/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('espace/pharmacie/table/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('espace/pharmacie/table/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('espace/pharmacie/table/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('espace/pharmacie/table/css/main.css') }}">
<!--===============================================================================================-->
@livewireStyles
@endsection



@section('content')
<div class="col-sm-8 col-md-9">
    <div class="card">
        @livewire('pharmacie.live-recherche')
    </div>
</div>
@endsection



@section('js')
<!--===============================================================================================-->
<script src="{{ asset('espace/pharmacie/table/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('espace/pharmacie/table/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('espace/pharmacie/table/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('espace/pharmacie/table/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('espace/pharmacie/table/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script>
    $('.js-pscroll').each(function(){
        var ps = new PerfectScrollbar(this);

        $(window).on('resize', function(){
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
@livewireScripts
@endsection
