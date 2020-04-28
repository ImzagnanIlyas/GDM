@extends('medecin.layouts.m_layout')

@section('content')
<style>
    .active-nav-item{
        border-radius: 0px 50px 50px 50px;
        -moz-border-radius: 0px 50px 50px 50px;
        -webkit-border-radius: 0px 0px 20px 20px;
        border: 1px solid #ffffff;
        background-color: white;
    }
    .active-nav-item a{
        color: #36b9cc !important;
    }
</style>
@php
use Illuminate\Support\Facades\Request;
$active1 = Request::segment(3);
$active2 = Request::segment(4);
@endphp

<div class="col-sm-8 col-md-12 d-flex justify-content-center">

    <div class="card col-md-4">
        <div class="card-block">
            <div class="col-lg-12">
                <div class="d-flex justify-content-start align-items-center p-2">
                        <a href="#">
                            <img
                            class="img-circle"
                            @if($consultation->patient->sexe === "Homme")
                            src="{{ asset('img/medecin/male.png') }}"
                            @else
                            src="{{ asset('img/medecin/female.png') }}"
                            @endif
                            style="width: 100px;height:100px;border-radius: 50%;background-color: #90DFAA;">
                        </a>
                    <div class="ml-3">
                        <h5 class="font-weight-bold">
                            @if($consultation->patient->sexe === "Homme")
                            M.
                            @else
                            Mme.
                            @endif
                            {{ strtoupper($consultation->patient->nom) }}
                            {{ $consultation->patient->prenom }}
                        </h5>
                        <hr style="margin:8px auto">
<<<<<<< HEAD
                        <h6>{{ $consultation->patient->cin }} - {{ date("m/d/Y", strtotime($consultation->patient->ddn)) }}</h6>
=======
                        <h6>{{ $consultation->patient->cin }} - {{ date("d/m/yy", strtotime($consultation->patient->ddn)) }}</h6>
>>>>>>> 064f3f56bbbbfcfdb623386a1488c1357a7f59a4
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card col-md-4">
        <div class="card-block">
            <div class="col-lg-12">
                <div class="d-flex justify-content-start align-items-center p-2">
                        <a href="#">
                            <img
                            class="img-circle"
                            @if($consultation->medecin->patient->sexe === "Homme")
                            src="{{ asset('img/medecin/doctor.png') }}"
                            @else
                            src="{{ asset('img/medecin/doctore.png') }}"
                            @endif
                            style="width: 100px;height:100px;border-radius: 50%;background-color: #90DFAA;">
                        </a>
                    <div class="ml-3">
                        <h5 class="font-weight-bold">
                            Dr.
                            {{ strtoupper($consultation->medecin->patient->nom) }}
                            {{ $consultation->medecin->patient->prenom }}
                        </h5>
                        <hr style="margin:8px auto">
                        <h6>{{ $consultation->medecin->specialite }} - {{ $consultation->medecin->inpe }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card col-md-4">
        <div class="card-block">
            <div class="col-lg-12">
                <div class="d-flex justify-content-start align-items-center p-2">
                    <a href="#">
                        <img
                        class="img-circle"
                        @empty($consultation->ordonnance)
                        src="{{ asset('img/medecin/doc-no.png') }}"
                        @else
                        src="{{ asset('img/medecin/doc-yes.png') }}"
                        @endempty
                        style="width: 100px;height:100px;border-radius: 50%;background-color: #90DFAA;">
                    </a>
                    <div class="ml-3">
                        <h5 class="font-weight-bold">
                            @empty($consultation->ordonnance)
                            Consultation non terminée
                            @else
                            Consultation terminée
                            @endempty
                        </h5>
                        <hr style="margin:8px auto">
                        <h6>{{ $consultation->id }} - {{ date("d/m/Y H:i", strtotime($consultation->created_at)) }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-md-12 mt-4">
    <div class="card shadow">
        <div class="card-header">
            <nav class="navbar navbar-dark navbar-expand-md bg-info border rounded shadow m-auto visible col-md-9" style="filter: brightness(106%) contrast(106%) grayscale(27%) saturate(124%) sepia(0%);">
                <div class="container"><button data-toggle="collapse" class="navbar-toggler btn-lg btn-block" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse justify-content-around" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item @if($active1 === 'informations') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.consultation.showInfo', [ 'id' => Crypt::encrypt($consultation->id) ]) }}">Informations</a></li>
                            <li class="nav-item @if($active1 === 'examen-general') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.consultation.showEG', [ 'id' => Crypt::encrypt($consultation->id) ]) }}">Examen général</a></li>
                            <li class="nav-item @if($active2 === 'examen-specialise') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.consultation.showExamSpecial', [ 'consultation_id' => Crypt::encrypt($consultation->id) ]) }}">Examen(s) spécialisé(s)</a></li>
                            <li class="nav-item @if($active2 === 'examen-complementaire') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.consultation.showExamCompl', [ 'consultation_id' => Crypt::encrypt($consultation->id) ]) }}">Examen complémentaire</a></li>
                            <li class="nav-item @if($active2 === 'ordonnance') active-nav-item @endif" role="presentation"><a class="nav-link" href="{{ route('medecin.consultation.showOrdonnance', [ 'consultation_id' => Crypt::encrypt($consultation->id) ]) }}">Ordonnance</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="card-body">
            <div class="row justify-content-around">

                @yield('onglet')

            </div>
        </div>
    </div>
</div>

@endsection

