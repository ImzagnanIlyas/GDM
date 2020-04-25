@extends('medecin.layouts.m_layout')

@section('title')
    Nouvelle consultation
@endsection

@section('content')

<style>
    .card {
        width: 60%;
    }
    .wrapper {
    text-align: center;
}

.button {
    position: absolute;
    top: 50%;
}
</style>

<div class="container-fluid">
<div class="row justify-content-center">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">
                Nouvelle consultaion médicale pour {{ $patient->nom }}
            </p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-row justify-content-center">
                    <div>
                        <form method="POST" action="{{ route('nouvelle-consultation.store') }}" class="custom-form" >
                            @csrf
                            <div class="form-row form-group">
                                <div class="col-sm-4 label-column"><label class="col-form-label" for="lieu">Lieu</label></div>
                                <div class="col-sm-6 input-column"><input class="form-control" type="text" id="lieu" name="lieu" required></div>
                            </div>
                            <div class="form-row form-group">
                                <div class="col-sm-4 label-column" style="padding-right: 5px;">
                                    <label class="col-form-label" for="motif">Motif</label>
                                </div>
                                <div class="col-sm-6 input-column">
                                    <textarea id="motif" name="motif" rows="5" cols="35" class="form-control form-control-lg" required></textarea>
                                </div>
                            </div>
                            <input class="form-control" type="hidden" name="id" value="{{ $patient->id }}">
                            <div class="wrapper">
                            <button class="btn btn-success" type="submit">
                                Valider
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
