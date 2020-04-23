<div class="col-md-12">
    <div class="col-sm-8 col-md-12">
        <div class="row justify-content-between px-2">
            <h4 class="text-dark">Examens complémentaires</h4>
            <button class="btn btn-success" wire:click="createExam" title="Ajouter un examen complémentaire"> <i class="fas fa-plus" style="width: 80px"></i> </button>
        </div>
    </div>
    @if ($consultation->ECs->isEmpty())
        <div class="alert alert-warning mt-4" role="alert">
            Aucun examen complémentaire pour cette consultation.
        </div>
    @else
    <div class="table-responsive table col-md-12 mt-4 overflow-auto" style="max-height: 305px">
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
                @foreach( $consultation->ECs as $EC )
                <tr>
                    <td>{{ json_decode($EC->bilan)->type }}</td>
                    <td>{{ $EC->created_at }}</td>
                    @if (! $EC->confirmation )
                    <td class="text-center" title="En attend"> <i class="fas fa-clock" style="color: orange;font-size: x-large;"></i> </td>
                    <td> - </td>
                    <td> - </td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('medecin.consultation.showExamComplBilan', [ 'consultation_id' => Crypt::encrypt($consultation->id), 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-info col-6 mr-1">Bilan</a>
                        <a href="" class="btn btn-primary disabled col-6 ml-1">Résultat</a>
                    </td>
                    @else
                    <td  class="text-center" title="Résultat ajouté"> <i class="fas fa-check-circle" style="color: green;font-size: x-large;"></i> </td>
                    <td> {{ $EC->examinateur->nom }}</td>
                    <td> {{ $EC->updated_at }} </td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('medecin.consultation.showExamComplBilan', [ 'consultation_id' => Crypt::encrypt($consultation->id), 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-info col-6 mr-1" >Bilan</a>
                        <a href="{{ route('medecin.consultation.showExamComplResultat', [ 'consultation_id' => Crypt::encrypt($consultation->id), 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-primary col-6 ml-1">Résultat</a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

</div>
