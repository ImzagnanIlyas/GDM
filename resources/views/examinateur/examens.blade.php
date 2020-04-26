@extends('examinateur.layouts.examinateur_nav')

@section('title')
    Les examens complémentaires
@endsection



@section('css')
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('espace/pharmacie/css/ordonnance.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('espace/pharmacie/table/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<style>

</style>
@livewireStyles
@endsection


@section('content')

@livewire('examinateur.live-examens', $patient)

@endsection



@section('js')
<script src="{{ asset('espace/pharmacie/table/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
@livewireScripts
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

@endsection
