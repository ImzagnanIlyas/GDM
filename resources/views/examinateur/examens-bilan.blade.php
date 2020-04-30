@extends('examinateur.layouts.examinateur_nav')

@section('title')
    Bilan de l'examen complémentaire
@endsection



@section('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
#quill-textarea{
border: 1px solid gray;
}
</style>
@endsection


@section('content')
@php $patient = $examen->consultation->patient @endphp
<div class="col-sm-8 col-md-12">
    <div class="card">
        <div class="card-block">
            <div class="col-lg-12">
                <div class="media">
                    <a class="pull-left" href="#">
                        <img
                        class="media-object img-circle"
                        @if($patient->sexe === "Homme")
                        src="{{ asset('img/male.png') }}"
                        @else
                        src="{{ asset('img/female.png') }}"
                        @endif
                        style="width: 100px;height:100px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            @if($patient->sexe === "Homme")
                            M.
                            @else
                            Mme.
                            @endif
                            {{ strtoupper($patient->nom) }}
                            {{ $patient->prenom }}
                        </h4>
                        <h5>{{ $patient->cin }} - {{ date("m/d/yy", strtotime($patient->ddn)) }}</h5>
                        <hr style="margin:8px auto">
                        <p>{{ strtoupper($patient->adresse) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-8 col-md-12 m-0">
    <div class="card mb-0">
        <h4 class="text-dark text-center">Examen complémentaire sélectionné</h4>
    </div>
</div>
<div class="col-sm-8 col-md-12">
    <div class="card">
        <div class="card-block">
            <table class="table dataTable my-0">
                <thead>
                    <tr>
                        <th class="col-2">Type</th>
                        <th class="col-2">Date</th>
                        <th class="col-1">Résultat</th>
                        <th class="col-3">Examinateur</th>
                        <th class="col-2">Date du résultat</th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ json_decode($examen->bilan)->type }}</td>
                        <td>{{ $examen->created_at }}</td>
                        @if (! $examen->confirmation )
                        <td class="text-center" title="En attend"> <i class="fas fa-clock" style="color: orange;font-size: x-large;"></i> </td>
                        <td> - </td>
                        <td> - </td>
                        <td class="d-flex justify-content-between">
                            <a href="{{ route('examinateur.showExamsAjoutResultat', [ 'examen_id' => Crypt::encrypt($examen->id), 'type' => 'text' ]) }}" class="btn btn-primary col-6 ml-1">Ajouter résultat</a>
                        </td>
                        @else
                        <td  class="text-center" title="Résultat ajouté"> <i class="fas fa-check-circle" style="color: green;font-size: x-large;"></i> </td>
                        <td> {{ $examen->examinateur->nom }}</td>
                        <td> {{ $examen->updated_at }} </td>
                        <td class="d-flex justify-content-between">
                            <a href="{{ route('examinateur.showExamsResultat', [ 'examen_id' => Crypt::encrypt($examen->id) ]) }}" class="btn btn-primary col-6 ml-1">Voir résultat</a>
                        </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-sm-8 col-md-12 m-0">
    <div class="card mb-0">
        <h4 class="text-dark text-center">Bilan</h4>
    </div>
</div>
<div class="col-sm-8 col-md-12">
    <div class="card">
        <div class="card-block">
            <div class="col-md-12">
                <div class="card-body">
                    <div id="quill-textarea" style="color: black">
                        {!! json_decode($examen->bilan)->text !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('js')
<script src="{{ asset('espace/pharmacie/table/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
    var toolbarOptions2 = [];
    var quill2 = new Quill('#quill-textarea', {
        readOnly: true,
        modules: {
            toolbar: toolbarOptions2
        },
        theme: 'bubble'
    });
</script>
@endsection
