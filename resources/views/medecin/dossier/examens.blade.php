@extends('medecin.layouts.dossier_layout')

@section('onglet')
<div class="col-md-12 d-flex justify-content-end mt-2">
    <input class="form-control col-3" type="text" placeholder="Rechercher par date" id="searchInput">
</div>
<div class="d-flex justify-content-center mt-2"">
    @if ($examens->isEmpty())
        <div class="alert alert-warning mt-4" role="alert">
            Ce patient n'a passé aucun examen.
        </div>
    @else
    <div class="table-responsive table col-md-12 overflow-auto" style="max-height: 405px">
        <table class="table dataTable my-0">
            <thead>
                <tr>
                    <th class="col-2">Type</th>
                    <th class="col-2">Date</th>
                    <th class="col-1">Résultat</th>
                    <th class="col-2">Examinateur</th>
                    <th class="col-2">Date du résultat</th>
                    <th class="col-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $examens as $EC )
                <tr>
                    <td>{{ json_decode($EC->bilan)->type }}</td>
                    <td>{{ date('d/m/Y', strtotime($EC->created_at)) }}</td>
                    @if (! $EC->confirmation )
                    <td class="text-center" title="En attend"> <i class="fas fa-clock" style="color: orange;font-size: x-large;"></i> </td>
                    <td> - </td>
                    <td> - </td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('medecin.dossier.showExamen', [ 'patient_id' => Crypt::encrypt($patient->id), 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-primary col-10 mr-1">Bilan</a>
                    </td>
                    @else
                    <td  class="text-center" title="Résultat ajouté"> <i class="fas fa-check-circle" style="color: green;font-size: x-large;"></i> </td>
                    <td> {{ $EC->examinateur->nom }}</td>
                    <td> {{ date('d/m/Y', strtotime($EC->updated_at)) }} </td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('medecin.dossier.showExamen', [ 'patient_id' => Crypt::encrypt($patient->id), 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-primary col-10 mr-1" >Bilan et Résultat</a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
<div class="d-flex justify-content-center">
    {{ $examens->links() }}
</div>

@endsection
