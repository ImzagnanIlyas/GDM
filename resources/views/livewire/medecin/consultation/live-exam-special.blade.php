<div class="col-md-12">

    <div class="col-sm-8 col-md-12">
        <div class="row justify-content-between px-2">
            <h4 class="text-dark">Examens spécialisés</h4>
            <button class="btn btn-success" wire:click="showCreateForm"> <i class="fas fa-plus" style="width: 80px"></i> </button>
        </div>
    </div>
    <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 305px">
        <table class="table dataTable my-0">
            <thead>
                <tr>
                    <th class="col-3">Titre</th>
                    <th>Date</th>
                    <th>Résultat</th>
                    <th>Date de la resultat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse( $consultation->ESs as $ES )
                <tr>
                    <td>{{ $ES->nom }}</td>
                    <td>{{ $ES->created_at }}</td>
                    @if ( empty($ES->resultat) )
                    <td title="En attend"> <i class="fas fa-clock ml-3" style="color: orange;font-size: x-large;"></i> </td>
                    <td> - </td>
                    <td>
                        <a href="{{ route('medecin.consultation.showExamSpecialAjoutResultat', [ 'consultation_id' => $consultation->id, 'examen_id' => $ES->id, 'type' => 'text' ]) }}" class="btn btn-primary">Ajouter résultat</a>
                    </td>
                    @else
                    <td title="Résultat ajouté"> <i class="fas fa-check-circle ml-3" style="color: green;font-size: x-large;"></i> </td>
                    <td> {{ $ES->updated_at }} </td>
                    <td>
                        <a href="{{ route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => $consultation->id, 'examen_id' => $ES->id ]) }}" class="btn btn-primary">Voir résultat</a>
                        <!-- <button class="btn btn-primary" wire:click="showResultat({{$ES->id}})">Voir resultat</button> -->
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <div class="alert alert-warning" role="alert">
                        Aucun examen pour cette consultation.
                    </div>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
