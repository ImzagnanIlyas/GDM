@extends('pharmacie.layouts.pharmacie')

@section('title')
    Accueil
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
<style>
#timedate {
  text-align:left;
  color: black;
  border-left: 3px solid #ed1f24;
  padding-left: 3%;
}
</style>
@livewireStyles
@endsection



@section('content')
<div class="col-sm-8 col-md-9">
    <div class="page-wrapper">
        <div class="row">
            @livewire('patient.live-accueil')
        </div>
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
    // START CLOCK SCRIPT

    Number.prototype.pad = function(n) {
    for (var r = this.toString(); r.length < n; r = 0 + r);
    return r;
    };

    function updateClock() {
    var now = new Date();
    var milli = now.getMilliseconds(),
        sec = now.getSeconds(),
        min = now.getMinutes(),
        hou = now.getHours(),
        mo = now.getMonth(),
        dy = now.getDate(),
        yr = now.getFullYear();
    var months = ["Janv.", "févr.", "Mars", "Avr.", "Mai", "Juin.", "Juill.", "Août", "Sept.", "Oct.", "Nov.", "Déc."];
    var tags = ["mon", "d", "y", "h", "m", "s", "mi"],
        corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2), milli];
    for (var i = 0; i < tags.length; i++)
        document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
    }

    function initClock() {
    updateClock();
    window.setInterval("updateClock()", 1);
    }

    // END CLOCK SCRIPT
</script>
<!--===============================================================================================-->
@livewireScripts
@endsection
