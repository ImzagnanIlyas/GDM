@extends('pharmacie.layouts.pharmacie_nav')

@section('title')
    Ordonnances
@endsection



@section('css')
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('espace/pharmacie/css/ordonnance.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('espace/pharmacie/table/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<style>
    .dp
    {
        border:10px solid #eee;
        transition: all 0.2s ease-in-out;
    }
    .dp:hover
    {
        border:2px solid #eee;
        transform:rotate(360deg);
        -ms-transform:rotate(360deg);
        -webkit-transform:rotate(360deg);
        /*-webkit-font-smoothing:antialiased;*/
    }
</style>
@livewireStyles
@endsection


@section('content')

@livewire('patient.live-ordonnance')

@endsection



@section('js')
<script src="{{ asset('espace/pharmacie/table/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script>
$('.js-pscroll').each(function(){
    var ps = new PerfectScrollbar(this);

    $(window).on('resize', function(){
        ps.update();
    })
});
function comp(nameid) {
  $(".inputGroup :checkbox").prop("checked", false);
  $('.companies').addClass('hidden');
  $(nameid).removeClass('hidden').addClass('visible');
}
</script>
@livewireScripts
@endsection
