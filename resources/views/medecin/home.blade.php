@extends('medecin.layouts.m_layout')

@section('title')
    Accueil
@endsection

<style>
.card{
     margin: 2%;
}
#timedate {
  color: black;
  border-left: 3px solid #ed1f24;
  padding-left: 10%;
  float: right;
}

</style>

@section('content')
<div class="container">
    <div class="card shadow border-info" >
        <div class="card-body">
            <div class="row">
                <div class="col text-info">
                    <p class="card-text " style="font-size: 32px;">Bonjour docteur(e) {{ Auth::guard('medecin')->user()->patient->nom }}</p>
                </div>
                <div class="col-auto">
                    <p id="timedate">{{ date("d-m-Y") }} {{ date("H:i") }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card-group">
        <div class="card shadow border-left-primary border-primary py-2">
            <div class="card-body text-center">
                <div class="text-uppercase text-primary font-weight-bold">
                    <p class="card-text" style="font-size: 20px;">
                        <a href="{{ route('medecin.showSearchAlert') }}" class="stretched-link"></a>Nouvelle consultation
                    </p>
                </div>
            </div>
        </div>

        <div class="card shadow border-left-success border-right-success border-success py-2">
            <div class="card-body text-center">
                <div class="text-uppercase text-success font-weight-bold">
                    <p class="card-text" style="font-size: 20px;">
                        <a href="#" class="stretched-link"></a>Liste des médicaments
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
