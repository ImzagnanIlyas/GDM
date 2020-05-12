@extends('medecin.layouts.dossier_layout')

@section('onglet')
<div class="col-md-12 d-flex justify-content-between mt-3">
    <h4 class="text-center"><b>Allergies</b></h4>
</div>
<div class="d-flex justify-content-center mt-2">
    @if ( empty($allergies) )
        <div class="alert alert-warning mt-4" role="alert">
            Ce patient n'a pas d'allergies.
        </div>
    @else
        <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
            <table class="table dataTable my-0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allergies as $tmp)
                    <tr>
                        <td>{{ $tmp->nom }}</td>
                        <td>{{ $tmp->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
<hr>
<div class="col-md-12 d-flex justify-content-between mt-2">
    <h4 class="text-center"><b>Traitements chroniques</b></h4>
</div>
<div class="d-flex justify-content-center mt-2">
    @if ($TC->isEmpty())
        <div class="alert alert-warning mt-4" role="alert">
            Aucun traitement chronique pour ce patient.
        </div>
    @else
        <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
            <table class="table dataTable my-0">
                <thead>
                    <tr>
                        <th>Nom médicament</th>
                        <th>Dose</th>
                        <th>Rythme</th>
                        <th>Date Début</th>
                        <th>Commentaire</th>
                        <th>Consultation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($TC as $pres)
                        <tr>
                            <td>{{$pres->nom}}</td>
                            <td>{{$pres->dose}}</td>
                            <td>{{$pres->rythme}}</td>
                            <td>{{ date('d/m/Y',strtotime($pres->date_debut)) }}</td>
                            <td>{{$pres->commentaire}}</td>
                            <td><a href="{{ route('medecin.consultation.showOrdonnance', [ 'consultation_id' => Crypt::encrypt($pres->consultation->id) ]) }}"> go </a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>


@endsection
