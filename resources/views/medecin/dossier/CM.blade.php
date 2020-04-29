@extends('medecin.layouts.dossier_layout')

@section('onglet')
<div class="col-md-12 d-flex justify-content-end mt-2">
    <input class="form-control col-3" type="text" placeholder="Rechercher par date" id="searchInput">
</div>
<div class="d-flex justify-content-center mt-2"">
    @if ($consultations->isEmpty())
        <div class="alert alert-warning mt-4" role="alert">
            Ce patient n'a passé aucune consultation.
        </div>
    @else
        <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
            <table class="table dataTable my-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Médecin</th>
                        <th class="col-3">Lieu</th>
                        <th class="col-3">Motif</th>
                        <th>Date</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $consultations as $c )
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ strtoupper($c->medecin->patient->nom).' '.strtoupper($c->medecin->patient->prenom) }}</td>
                        <td>{{ $c->lieu }}</td>
                        <td>{{ $c->motif }}</td>
                        <td>{{ date('d/m/Y',strtotime($c->date )) }}</td>
                        <td><a href="{{ route('medecin.consultation.showExamSpecial', [ 'consultation_id' => Crypt::encrypt($c->id) ]) }}" class="btn btn-primary"><i class="fas fa-external-link-alt"></i></a></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
<div class="d-flex justify-content-center">
    {{ $consultations->links() }}
</div>

@endsection
