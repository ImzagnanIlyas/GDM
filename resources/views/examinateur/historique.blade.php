@extends('examinateur.layouts.examinateur')

@section('title')
    Hitorique des examens complémentaires confirmé
@endsection



@section('css')
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('espace/pharmacie/css/ordonnance.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('espace/pharmacie/table/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<style>

</style>
@livewireStyles
@endsection


@section('content')

<div class="col-sm-8 col-md-9">
    <div class="page-wrapper">
        <div class="row">
            @livewire('examinateur.live-historique')
        </div>
    </div>
</div>

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
<script>
    $(document).ready(function(){
        $('input[name="date"]').change(function(){
            window.livewire.emit('search', this.value)
        });
    });
</script>

@endsection
