@extends('medecin.layouts.m_layout')

@section('title')
    Nouvelle consultation
@endsection

@section('content')
    <h3 class="text-dark mb-4">Nouvelle consultation médicale</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">
                Nouvelle consultaion médicale pour {{ $patient->nom }}
            </p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form>
                    <div class="form-row">
                        <div style="margin-left: 20%;">
                            <form method="POST" action="{{ route('medecin.enrg_cons', ['patient' => $patient->id]) }}" class="custom-form" style="margin-top: 0px;margin-bottom: 0px;padding-top: 55px;">
                                @csrf
                                <div class="form-row form-group">
                                    <div class="col-sm-4 label-column"><label class="col-form-label" for="lieu">Lieu</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="text" id="lieu" name="lieu"></div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 label-column" style="padding-right: 5px;">
                                        <label class="col-form-label" for="motif">Motif</label>
                                    </div>
                                    <div class="col-sm-6 input-column">
                                        <textarea id="motif" name="motif" class="form-control form-control-lg"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-success submit-button" type="submit">
                                    Valider
                                </button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
