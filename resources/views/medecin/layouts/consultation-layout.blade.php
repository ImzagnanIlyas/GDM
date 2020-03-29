@extends('medecin.layouts.m_layout')

@section('content')

<h3 class="text-dark mb-4">Consultation {{ $consultation->id }}</h3>
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header">
            <nav class="navbar navbar-dark navbar-expand-md bg-info border rounded shadow m-auto visible col-md-8" style="filter: brightness(106%) contrast(106%) grayscale(27%) saturate(124%) sepia(0%);">
                <div class="container"><button data-toggle="collapse" class="navbar-toggler btn-lg btn-block" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse justify-content-around" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.consultation.showInfo', [ 'id' => $consultation->id ]) }}">Informations</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="">Examen général</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('medecin.consultation.showExamSpecial', [ 'consultation_id' => $consultation->id ]) }}">Examen spécialisé</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="">Examen complémentaire</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="">Ordonnance</a></li>
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

